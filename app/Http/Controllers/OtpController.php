<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Otp;
use Carbon\Carbon;

class OtpController extends Controller
{
    // Fungsi untuk generate OTP
    public function generateOtp()
    {
        return rand(100000, 999999); // OTP 6 digit
    }

    // Fungsi untuk kirim OTP melalui Fonnte
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^\+?62[0-9]{9,15}$/'
        ]);

        $phone = $request->phone;
        $otp = $this->generateOtp();

        // Simpan OTP ke database dengan expiration time 5 menit
        Otp::create([
            'phone' => $phone,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5)
        ]);

        // Mengirim OTP menggunakan cURL
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $phone,
                'message' => $otp,
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: EeG_seKmLqcGHA37!G7z'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Kembalikan respons JSON
        return response()->json([
            'success' => true,
            'message' => 'OTP berhasil dikirim ke ' . $phone,
            'phone' => $phone
        ]);
    }

    // Fungsi untuk verifikasi OTP
    public function verifyOtp(Request $request)
    {
        // Validasi input
        $request->validate([
            'phone' => 'required|regex:/^\+?62[0-9]{9,15}$/',
            'otp' => 'required|integer'
        ]);

        $phone = $request->phone;
        $otp = $request->otp;

        // Cek apakah OTP valid dan belum kadaluarsa
        $otpEntry = Otp::where('phone', $phone)->where('otp', $otp)->first();

        if (!$otpEntry || $otpEntry->expires_at < now()) {
            // Jika OTP tidak valid atau sudah kadaluarsa
            return redirect()->back()->with('error', 'OTP tidak valid atau telah kadaluarsa.');
        }

        // Jika verifikasi berhasil, hapus OTP dari database
        $otpEntry->delete();

        // Menyimpan nomor telepon dalam session untuk ditampilkan
        session(['otp_verified' => true]); // Set session variable for OTP verification
        session(['phone' => $phone]); // Store the phone number in session

        // Redirect kembali ke halaman detail
        return redirect()->back();
    }
}

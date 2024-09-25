<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Properti;
use App\Models\Sertifikat;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PropertiController extends Controller
{
    public function index()
    {
        $props = Properti::all();
        $title = 'Delete Properti!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('backend.properti.index', compact('props'));
    }

    public function add()
    {
        $kota = Kota::all();
        $sertif = Sertifikat::all();
        return view('backend.properti.add', compact('kota', 'sertif'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'alamat' => 'required',
            'notelp' => 'required|numeric',
            'kota_id' => 'required',
            'harga' => 'required',
            'sertifikat_id' => 'required',
            'lt' => 'required',
            'gambar.*' => 'required|image|mimes:jpeg,jpg,png|max:5120', // Validasi multiple images
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            toast('Validation failed! Please check your input.', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses multiple gambar
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                // Simpan setiap gambar di folder 'images' dalam 'storage/app/public'
                $gambarPaths[] = $gambar->store('images', 'public');
            }
        }

        // Generate slug otomatis dari judul
        $slug = Str::slug($request->judul);

        // Simpan data properti dengan gambar yang sudah dikonversi ke JSON
        Properti::create([
            'judul' => $request->judul,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'kota_id' => $request->kota_id,
            'harga' => $request->harga,
            'sertifikat_id' => $request->sertifikat_id,
            'lb' => $request->lb,
            'lt' => $request->lt,
            'kt' => $request->kt,
            'km' => $request->km,
            'garasi' => $request->garasi,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug,
            'gambar' => json_encode($gambarPaths), // Simpan sebagai JSON
        ]);

        // Penanganan menyimpan inputan summernote
        $content = $request->deskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);

        $content = $dom->saveHTML();

        toast('Your data has been submitted!', 'success');
        return redirect()->route('properti.view');
    }

    public function edit($id)
    {
        $kota = Kota::all();
        $sertif = Sertifikat::all();
        $editProperti = Properti::find($id);
        return view('backend.properti.edit', compact('editProperti', 'kota', 'sertif'));
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'alamat' => 'required',
            'notelp' => 'required|numeric',
            'kota_id' => 'required',
            'harga' => 'required',
            'sertifikat_id' => 'required',
            'lt' => 'required',
            'gambar.*' => 'image|mimes:jpeg,jpg,png|max:5120', // Validasi multiple images
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            toast('Validation failed! Please check your input.', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ambil data properti berdasarkan ID
        $properti = Properti::findOrFail($id);

        // Proses multiple gambar
        $gambarPaths = json_decode($properti->gambar, true) ?? []; // Ambil gambar yang ada

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                // Simpan setiap gambar di folder 'images' dalam 'storage/app/public'
                $gambarPaths[] = $gambar->store('images', 'public');
            }
        }

        // Generate slug otomatis dari judul
        $slug = Str::slug($request->judul);

        // Update data properti dengan gambar yang sudah dikonversi ke JSON
        $properti->update([
            'judul' => $request->judul,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'kota_id' => $request->kota_id,
            'harga' => $request->harga,
            'sertifikat_id' => $request->sertifikat_id,
            'lb' => $request->lb,
            'lt' => $request->lt,
            'kt' => $request->kt,
            'km' => $request->km,
            'garasi' => $request->garasi,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug,
            'gambar' => json_encode($gambarPaths), // Simpan gambar sebagai JSON
        ]);

        // Penanganan menyimpan inputan summernote
        $content = $request->deskripsi;
        $dom = new \DOMDocument();
        @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $content = $dom->saveHTML();

        toast('Your data has been updated!', 'success');
        return redirect()->route('properti.view');
    }

    public function delete($id)
    {
        $properti = Properti::find($id);
        $properti->delete();
        toast('Your data as been deleted!', 'success');
        return redirect()->route('properti.view');
    }

    // Menampilkan modal detail data fast-boat
    public function show($id)
    {
        $properti = Properti::with(['kota', 'sertifikat'])->findOrFail($id); // Mengambil seluruh data fast-boat beserta company nya
        return response()->json($properti);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $jumlahKamar = $request->input('jumlahKamar');
        $luasTanah = $request->input('luasTanah');
        $minHarga = $request->input('minHarga');
        $maxHarga = $request->input('maxHarga');
        $kota = $request->input('kota');

        $query = Properti::query();

        // Filter berdasarkan kota terlebih dahulu jika dipilih
        if ($kota) {
            $query->where('kota_id', $kota);
        }

        // Pencarian berdasarkan keyword pada judul atau nama kota
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'LIKE', "%$keyword%")
                    ->orWhereHas('kota', function ($q) use ($keyword) {
                        $q->where('nama', 'LIKE', "%$keyword%");
                    });
            });
        }

        // Filter jumlah kamar
        if ($jumlahKamar) {
            $query->where('kt', '>=', $jumlahKamar);
        }

        // Filter luas tanah
        if ($luasTanah) {
            switch ($luasTanah) {
                case 1:
                    $query->where('lt', '<', 50);
                    break;
                case 2:
                    $query->where('lt', '>=', 50);
                    break;
                case 3:
                    $query->where('lt', '>=', 100);
                    break;
                case 4:
                    $query->where('lt', '>=', 200);
                    break;
                case 5:
                    $query->where('lt', '>=', 300);
                    break;
                case 6:
                    $query->where('lt', '>=', 500);
                    break;
            }
        }

        // Filter harga minimum
        if ($minHarga) {
            switch ($minHarga) {
                case 1:
                    $query->where('harga', '<=', 500000000); // <= 500 Juta
                    break;
                case 2:
                    $query->where('harga', '<=', 1000000000); // <= 1 Milyar
                    break;
                case 3:
                    $query->where('harga', '<=', 10000000000); // <= 10 Milyar
                    break;
                case 4:
                    $query->where('harga', '<=', 20000000000); // <= 20 Milyar
                    break;
                case 5:
                    $query->where('harga', '<=', 50000000000); // <= 50 Milyar
                    break;
                case 6:
                    $query->where('harga', '<=', 100000000000); // <= 100 Milyar
                    break;
            }
        }

        // Filter harga maksimum
        if ($maxHarga) {
            switch ($maxHarga) {
                case 1:
                    $query->where('harga', '>=', 500000000); // >= 500 Juta
                    break;
                case 2:
                    $query->where('harga', '>=', 1000000000); // >= 1 Milyar
                    break;
                case 3:
                    $query->where('harga', '>=', 10000000000); // >= 10 Milyar
                    break;
                case 4:
                    $query->where('harga', '>=', 20000000000); // >= 20 Milyar
                    break;
                case 5:
                    $query->where('harga', '>=', 50000000000); // >= 50 Milyar
                    break;
                case 6:
                    $query->where('harga', '>=', 100000000000); // >= 100 Milyar
                    break;
            }
        }

        // Mendapatkan hasil properti dan semua data kota
        $properti = $query->get();
        $kota = Kota::all();

        return view('properti', compact('properti', 'kota'));
    }
}

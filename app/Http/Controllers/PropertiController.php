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
}

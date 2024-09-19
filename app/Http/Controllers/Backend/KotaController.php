<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KotaController extends Controller
{
    public function index()
    {
        $kota = Kota::all();
        $title = 'Delete Route Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('Backend.kota.index', compact('kota'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            toast('Validation failed! Please check your input.', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataKota = new Kota();
        $dataKota->nama = $request->nama;
        $dataKota->save();
        toast('Your data as been submited!', 'success');
        return redirect()->route('kota.view');
    }

    // Menangani proses update data
    public function update(Request $request, $id)
    {
        // Menyimpan inputan ke dalam database
        $dataKota = Kota::find($id);          // Mencari id dari data yang di pilih
        $dataKota->nama = $request->nama;
        $dataKota->update();
        toast('Your data as been edited!', 'success');
        return redirect()->route('kota.view');
    }

    public function delete($id)
    {
        $kotaDelete = Kota::find($id);
        $kotaDelete->delete();
        toast('Your data as been deleted!', 'success');
        return redirect()->route('kota.view');
    }
}

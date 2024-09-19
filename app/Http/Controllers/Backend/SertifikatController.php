<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SertifikatController extends Controller
{
    public function index(){
        $sertifikat = Sertifikat::all();
        return view('backend.sertifikat.index', compact('sertifikat'));
    }

    public function store(Request $request){
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kode' => 'required',
        ]);

        // Cek apakah validasi gagal
        if ($validator->fails()) {
            toast('Validation failed! Please check your input.', 'error');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataSertif = new Sertifikat();
        $dataSertif->nama = $request->nama;
        $dataSertif->kode = $request->kode;
        $dataSertif->save();
        toast('Your data as been submited!', 'success');
        return redirect()->route('sertifikat.view');
    }

    public function update(Request $request, $id){
        $dataSertif = Sertifikat::find($id);          // Mencari id dari data yang di pilih
        $dataSertif->nama = $request->nama;
        $dataSertif->kode = $request->kode;
        $dataSertif->update();
        toast('Your data as been edited!', 'success');
        return redirect()->route('sertifikat.view');
    }

    public function delete($id){
        $delete = Sertifikat::find($id);
        $delete->delete();
        toast('Your data as been deleted!', 'success');
        return redirect()->route('sertifikat.view');
    }
}

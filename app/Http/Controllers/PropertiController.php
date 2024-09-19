<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Properti;
use App\Models\Sertifikat;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function index(){
        $props = Properti::all();
        return view('backend.properti.index');
    }

    public function add(){
        $kota = Kota::all();
        $sertif = Sertifikat::all();
        return view('backend.properti.add', compact('kota', 'sertif'));
    }
}

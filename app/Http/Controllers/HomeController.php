<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Properti;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properti = Properti::count();
        $kota = Kota::count();
        $chart = Properti::selectRaw('monthname(created_at) as month, count(*) as count')
        ->groupBy('month')
        ->orderByRaw('min(created_at)')
        ->pluck('count', 'month');
        $labels = $chart->keys();
        $data = $chart->values();
        return view('admin.index', compact('properti', 'kota', 'labels', 'data'));
    }
}

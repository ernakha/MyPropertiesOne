<?php

use App\Http\Controllers\Backend\KotaController;
use App\Http\Controllers\Backend\SertifikatController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\PropertiController;
use App\Models\Kota;
use App\Models\Properti;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Landing
Route::get('/', function () {
    // Ambil semua data properti dari database
    $properti = Properti::paginate(18);
    $kota = Kota::withCount('properti')->paginate(6);
    return view('welcome', compact('properti', 'kota'));
})->name('land');

// Properti
Route::get('/cari-properti', function () {
    // Ambil semua data properti dari database
    $properti = Properti::paginate(18);
    $kota = Kota::all();
    return view('properti', compact('properti', 'kota'));
})->name('cari');

// Detail
Route::get('/detail/{slug}', function ($slug) {
    $properti = Properti::where('slug', $slug)->firstOrFail();
    $kota = Kota::all();
    $sertifikat = Sertifikat::all();
    return view('detail', compact('properti', 'kota', 'sertifikat'));
})->name('detail');

// Otp
Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify', function(){
    return view('verify-otp');
});
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('verify.otp');

Auth::routes();
Route::get('/register', function () {
    return redirect('/login');
});

Route::get('/search', [PropertiController::class, 'search'])->name('properti.search');

Route::middleware([
    'auth:sanctum',
])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('master')->group(function () {
        // Kota
        Route::get('/kota', [KotaController::class, 'index'])->name('kota.view');
        Route::post('/kota/store', [KotaController::class, 'store'])->name('kota.store');
        Route::post('/kota/update/{id}', [KotaController::class, 'update'])->name('kota.update');
        Route::get('/kota/delete/{id}', [KotaController::class, 'delete'])->name('kota.delete');

        // Sertifikat
        Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.view');
        Route::post('/sertifikat/store', [SertifikatController::class, 'store'])->name('sertifikat.store');
        Route::post('/sertifikat/update/{id}', [SertifikatController::class, 'update'])->name('sertifikat.update');
        Route::get('/sertifikat/delete/{id}', [SertifikatController::class, 'delete'])->name('sertifikat.delete');

        // Properti
        Route::get('/properti',  [PropertiController::class, 'index'])->name('properti.view');
        Route::get('/properti/add',  [PropertiController::class, 'add'])->name('properti.add');
        Route::post('/properti/store', [PropertiController::class, 'store'])->name('properti.store');
        Route::get('/properti/edit/{id}',  [PropertiController::class, 'edit'])->name('properti.edit');
        Route::post('/properti/update/{id}', [PropertiController::class, 'update'])->name('properti.update');
        Route::delete('/properti/delete/{id}', [PropertiController::class, 'delete'])->name('properti.delete');
        Route::get('/properti/view/{id}',  function ($id) {
            $props = Properti::find($id);
            $gambar = json_decode($props->gambar);
            return view('backend.properti.view', compact('props', 'gambar'));
        })->name('properti.see');
        Route::get('/properti/{id}',  [PropertiController::class, 'show'])->name('properti.show');
    });
});

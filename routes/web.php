<?php

use App\Http\Controllers\Backend\KotaController;
use App\Http\Controllers\Backend\SertifikatController;
use App\Http\Controllers\PropertiController;
use App\Models\Properti;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/register', function () {
    return redirect('/login');
});


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
        Route::get('/properti/delete/{$id}', [PropertiController::class, 'delete'])->name('properti.delete');
        Route::get('/properti/view/{id}',  function($id){
            $props = Properti::find($id);
            $gambar = json_decode($props->gambar);
            return view('backend.properti.view', compact('props', 'gambar'));
        })->name('properti.edit');
    });
});

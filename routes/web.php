<?php

use App\Http\Controllers\Backend\KotaController;
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
        Route::get('/kota', [KotaController::class, 'index'])->name('kota.view');
        Route::post('/kota/store', [KotaController::class, 'store'])->name('kota.store');
        Route::post('/kota/update/{id}', [KotaController::class, 'update'])->name('kota.update');
        Route::get('/kota/delete/{id}', [KotaController::class, 'delete'])->name('kota.delete');
    });
});

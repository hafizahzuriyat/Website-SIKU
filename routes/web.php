<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'showContact'])->name('contact');
Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'aboutus'])->name('about-us');
Route::get('/info', [App\Http\Controllers\InfoController::class, 'info'])->name('info');

Route::get('/daftar-kerjasama', [App\Http\Controllers\DaftarKerjasamaController::class, 'index'])->name('daftar-kerjasama');
Route::post('/daftar-kerjasama-simpan', [App\Http\Controllers\DaftarKerjasamaController::class, 'simpan'])->name('daftar-kerjasama-simpan');
Route::put('/daftar-kerjasama-edit/{no_kontrak}', [App\Http\Controllers\DaftarKerjasamaController::class, 'edit'])->name('daftar-kerjasama-edit');
Route::delete('/daftar-kerjasama-hapus/{no_kontrak}', [App\Http\Controllers\DaftarKerjasamaController::class, 'delete'])->name('daftar-kerjasama-hapus');
Route::get('/cari-daftar', [App\Http\Controllers\DaftarKerjasamaController::class, 'cari'])->name('cari-daftar');
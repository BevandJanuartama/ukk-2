<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Redirect halaman utama ke daftar barang
Route::get('/', function () {
    return redirect()->route('barang.index');
});

Route::resource('barang', BarangController::class);

// Route cetak PDF
Route::get('cetak-laporan', [BarangController::class, 'cetakPdf'])->name('barang.pdf');
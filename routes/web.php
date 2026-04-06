<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes - UKK Junior Web Developer
|--------------------------------------------------------------------------
*/

// 1. Redirect halaman utama ke daftar barang
Route::get('/', function () {
    return redirect()->route('barang.index');
});

/**
 * 2. Route Resource (Menangani 7 fungsi CRUD sekaligus)
 * Mengarahkan URL /barang ke fungsi-fungsi di BarangController:
 * index, create, store, show, edit, update, destroy
 */
Route::resource('barang', BarangController::class);

/**
 * 3. Route Cetak PDF (Library Pihak Ketiga)
 * Pastikan nama route ini dipanggil di tombol "Cetak" pada view
 */
Route::get('cetak-laporan', [BarangController::class, 'cetakPdf'])->name('barang.pdf');
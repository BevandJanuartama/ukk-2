<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * Tentukan nama tabel jika tidak mengikuti aturan jamak Laravel (opsional)
     * Secara default Laravel akan mencari tabel bernama 'barangs'
     */
    protected $table = 'barangs';

    /**
     * Mass Assignment: Daftar kolom yang BOLEH diisi secara massal.
     * Ini sangat penting agar fungsi Barang::create($request->all()) di Controller tidak error.
     */
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok',
        'harga',
    ];

    /**
     * Jika kamu ingin melakukan perhitungan otomatis (Poin 2 Tugas 2: Fungsi/Prosedur),
     * kamu bisa menambahkan "Accessor" di sini.
     * Contoh: Menghitung total nilai stok (Harga x Stok)
     */
    public function getTotalNilaiAttribute()
    {
        return $this->harga * $this->stok;
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
// Gunakan baris ini secara lengkap:
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    /**
     * TAMPILKAN SEMUA DATA (READ)
     */
    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('barang.index', compact('barangs'));
    }

    /**
     * FORM TAMBAH DATA
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * SIMPAN DATA BARU (CREATE + VALIDASI)
     */
    public function store(Request $request)
    {
        // Poin 2 Tugas 2: Proses Validasi
        $request->validate([
            'kode_barang' => 'required|unique:barangs|max:10',
            'nama_barang' => 'required|min:3',
            'stok'        => 'required|numeric|min:0',
            'harga'       => 'required|numeric|min:0',
        ], [
            // Custom pesan error (opsional agar lebih rapi)
            'kode_barang.unique' => 'Kode barang sudah terdaftar!',
            'nama_barang.required' => 'Nama barang wajib diisi.',
        ]);

        // Simpan ke Database
        Barang::create($request->all());

        // Redirect dengan session (bisa ditangkap SweetAlert2 di view)
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * DETAIL BARANG (SHOW)
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * FORM EDIT DATA
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * UPDATE DATA (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required|max:10|unique:barangs,kode_barang,'.$id,
            'nama_barang' => 'required',
            'stok'        => 'required|numeric',
            'harga'       => 'required|numeric',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    /**
     * HAPUS DATA (DELETE)
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang telah dihapus dari sistem.');
    }

    /**
     * FUNGSI CETAK PDF (POIN 3 TUGAS 2 - LIBRARY PIHAK KETIGA)
     */
    public function cetakPdf()
    {
        $barangs = Barang::all();
        
        // Memuat view khusus untuk tampilan PDF
        $pdf = Pdf::loadView('barang.report_pdf', compact('barangs'));
        
        // Download file PDF
        return $pdf->download('laporan_stok_barang.pdf');
    }
}
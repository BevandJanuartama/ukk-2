<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->get(); // ambil data terbaru
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create'); // tampilkan form tambah
    }

    public function store(Request $request)
    {
        $request->validate([ // validasi input
            'kode_barang' => 'required|unique:barangs|max:10',
            'nama_barang' => 'required|min:3',
            'stok'        => 'required|numeric|min:0',
            'harga'       => 'required|numeric|min:0',
        ]);

        Barang::create($request->all()); // simpan data

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id); // ambil detail
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id); // ambil data edit
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([ // validasi update
            'kode_barang' => 'required|max:10|unique:barangs,kode_barang,'.$id,
            'nama_barang' => 'required',
            'stok'        => 'required|numeric',
            'harga'       => 'required|numeric',
        ]);

        $barang->update($request->all()); // update data

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete(); // hapus data

        return redirect()->route('barang.index')->with('success', 'Barang telah dihapus dari sistem.');
    }

    public function cetakPdf()
    {
        $barangs = Barang::all();

        $pdf = Pdf::loadView('barang.report_pdf', compact('barangs')); // generate PDF

        return $pdf->download('laporan_stok_barang.pdf'); // download file
    }
}
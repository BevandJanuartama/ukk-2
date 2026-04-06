@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Barang</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT') <div>
            <label class="block text-sm font-medium text-gray-700">Kode Barang</label>
            <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" class="w-full p-2 border rounded bg-gray-100" readonly>
            <p class="text-xs text-gray-400">*Kode barang tidak dapat diubah</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="w-full p-2 border rounded">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" class="w-full p-2 border rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}" class="w-full p-2 border rounded">
            </div>
        </div>

        <div class="pt-4 flex space-x-3">
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded font-bold hover:bg-yellow-600">Update Data</button>
            <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection
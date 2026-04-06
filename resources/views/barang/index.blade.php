@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Data Inventaris</h2>
        <a href="{{ route('barang.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Barang Baru</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Kode</th>
                    <th class="p-3 border">Nama Barang</th>
                    <th class="p-3 border">Stok</th>
                    <th class="p-3 border">Harga</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $b)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $loop->iteration }}</td>
                    <td class="p-3 border font-mono text-sm">{{ $b->kode_barang }}</td>
                    <td class="p-3 border">{{ $b->nama_barang }}</td>
                    <td class="p-3 border">{{ $b->stok }}</td>
                    <td class="p-3 border">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                    <td class="p-3 border flex justify-center space-x-2">
                        <a href="{{ route('barang.edit', $b->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                        <form action="{{ route('barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
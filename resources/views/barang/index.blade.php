<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris - Inventory App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 md:p-8 font-sans">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Daftar Inventaris Barang</h2>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('barang.pdf') }}" target="_blank" class="bg-red-600 text-white px-5 py-2.5 rounded-lg hover:bg-red-700 flex items-center transition shadow-sm font-semibold text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Cetak PDF
                </a> <!-- export PDF -->

                <a href="{{ route('barang.create') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-700 flex items-center transition shadow-sm font-semibold text-sm">
                    + Tambah Barang
                </a> <!-- tambah data -->
            </div>
        </div>

        <div class="overflow-x-auto"> <!-- responsive table -->
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left text-xs text-gray-700 uppercase tracking-wider">
                        <th class="p-3 border text-center">No</th>
                        <th class="p-3 border text-center">Kode</th>
                        <th class="p-3 border text-center">Nama Barang</th>
                        <th class="p-3 border text-center">Stok</th>
                        <th class="p-3 border text-center">Harga</th>
                        <th class="p-3 border text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 text-sm">
                    
                    @forelse($barangs as $b) <!-- loop data -->
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                        <td class="p-3 border font-mono text-indigo-600 font-semibold">{{ $b->kode_barang }}</td>
                        <td class="p-3 border font-medium">{{ $b->nama_barang }}</td>
                        <td class="p-3 border text-center">{{ $b->stok }}</td>
                        <td class="p-3 border">Rp {{ number_format($b->harga, 0, ',', '.') }}</td> <!-- format rupiah -->
                        
                        <td class="p-3 border text-center">
                            <div class="flex justify-center items-center space-x-2">
                                
                                <a href="{{ route('barang.edit', $b->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded transition">
                                    Edit
                                </a> <!-- edit -->

                                <form action="{{ route('barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf <!-- keamanan -->
                                    @method('DELETE') <!-- method delete -->
                                    
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded transition">
                                        Hapus
                                    </button>
                                </form> <!-- hapus -->
                            </div>
                        </td>
                    </tr>

                    @empty <!-- kondisi jika kosong -->
                    <tr>
                        <td colspan="6" class="p-10 text-center text-gray-400 italic">
                            Belum ada data barang tersedia.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
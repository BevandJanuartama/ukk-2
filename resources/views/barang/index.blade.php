<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris - Inventory App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Mengatur agar tombol aksi tidak ikut tercetak */
        @media print {
            .no-print, .btn-aksi {
                display: none !important;
            }
            .print-only {
                display: block !important;
            }
            body {
                background-color: white;
                padding: 0;
            }
            .shadow-md {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 p-4 md:p-8">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Daftar Inventaris Barang</h2>
                <p class="text-sm text-gray-500 no-print">Laporan data stok barang terbaru.</p>
            </div>
            
            <div class="flex gap-2 no-print">
                <button onclick="window.print()" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 flex items-center transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Cetak Laporan
                </button>

                <a href="{{ route('barang.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 flex items-center transition">
                    + Barang Baru
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left text-sm text-gray-700 uppercase">
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">Kode</th>
                        <th class="p-3 border">Nama Barang</th>
                        <th class="p-3 border">Stok</th>
                        <th class="p-3 border">Harga</th>
                        <th class="p-3 border text-center btn-aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">
                    @forelse($barangs as $b)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                        <td class="p-3 border font-mono text-sm text-indigo-600">{{ $b->kode_barang }}</td>
                        <td class="p-3 border font-medium">{{ $b->nama_barang }}</td>
                        <td class="p-3 border text-center">{{ $b->stok }}</td>
                        <td class="p-3 border">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                        
                        <td class="p-3 border btn-aksi">
                            <div class="flex justify-center items-center space-x-2">
                                <a href="{{ route('barang.edit', $b->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded text-xs transition">
                                    Edit
                                </a>
                                <form action="{{ route('barang.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded text-xs transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400 italic">Belum ada data barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="hidden print:block mt-10">
            <div class="flex justify-between">
                <div class="text-sm">
                    Dicetak pada: {{ date('d/m/Y H:i') }}
                </div>
                <div class="text-center">
                    <p class="text-sm mb-16">Petugas Inventaris,</p>
                    <p class="font-bold border-b border-gray-800 inline-block">Administrator</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
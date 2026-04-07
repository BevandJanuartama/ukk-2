<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Inventory App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="max-w-2xl w-full bg-white p-8 rounded-xl shadow-lg">
        
        <div class="mb-8 border-b pb-4 text-center">
            <h2 class="text-2xl font-bold text-indigo-900 uppercase tracking-wide">Form Tambah Barang</h2>
        </div>

        <form action="{{ route('barang.store') }}" method="POST" class="space-y-5">
            @csrf <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Barang</label>
                <input type="text" 
                       name="kode_barang" 
                       value="{{ old('kode_barang') }}" 
                       placeholder="Contoh: BRG-001"
                       class="w-full p-2.5 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition @error('kode_barang') border-red-500 @enderror"
                       required>
                @error('kode_barang') 
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang</label>
                <input type="text" 
                       name="nama_barang" 
                       value="{{ old('nama_barang') }}" 
                       placeholder="Masukkan nama barang..."
                       class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition @error('nama_barang') border-red-500 @enderror"
                       required>
                @error('nama_barang') 
                    <p class="text-red-500 text-xs mt-1 italic">{{ $message }}</p> 
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Stok Awal</label>
                    <input type="number" 
                           name="stok" 
                           value="{{ old('stok') }}" 
                           placeholder="0"
                           class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition"
                           required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga Satuan (Rp)</label>
                    <input type="number" 
                           name="harga" 
                           value="{{ old('harga') }}" 
                           placeholder="10000"
                           class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition"
                           required>
                </div>
            </div>

            <div class="pt-6 flex flex-col sm:flex-row gap-3">
                <button type="submit" 
                        class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-lg font-bold uppercase tracking-wider hover:bg-indigo-700 shadow-md hover:shadow-lg transition transform active:scale-95">
                    Simpan Data
                </button>
                <a href="{{ route('barang.index') }}" 
                   class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-bold uppercase tracking-wider text-center hover:bg-gray-300 transition">
                    Batal
                </a>
            </div>
        </form>
        <p class="mt-8 text-center text-xs text-gray-400">
            &copy; 2026 UKK RPL - SMK Telkom Banjarbaru
        </p>
    </div>

</body>
</html>
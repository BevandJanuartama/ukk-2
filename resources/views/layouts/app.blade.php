<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKK Junior Web Dev - Bepann</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <aside class="w-full md:w-64 bg-indigo-900 text-white p-6">
            <h1 class="text-2xl font-bold mb-8 text-center">Toko Bepann</h1>
            <nav class="space-y-4">
                <a href="{{ route('barang.index') }}" class="block py-2 px-4 hover:bg-indigo-700 rounded">Daftar Barang</a>
                <a href="{{ route('barang.create') }}" class="block py-2 px-4 hover:bg-indigo-700 rounded">Tambah Barang</a>
                <a href="{{ route('barang.pdf') }}" class="block py-2 px-4 hover:bg-red-600 rounded">Cetak Laporan (PDF)</a>
            </nav>
        </aside>

        <main class="flex-1 p-6 md:p-10">
            @yield('content')
        </main>
    </div>

    @if(session('success'))
    <script>
        Swal.fire('Berhasil!', "{{ session('success') }}", 'success');
    </script>
    @endif
</body>
</html>
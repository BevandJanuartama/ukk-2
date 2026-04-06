<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { bg-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>LAPORAN STOK BARANG - BEPANN</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $b)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->stok }}</td>
                <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
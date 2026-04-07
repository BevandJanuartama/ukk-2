<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        /* Table full lebar & border menyatu */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Border dan padding isi tabel */
        th, td {
            border: 1px solid black;
            padding: 6px;
        }

        /* Header tabel: center + background abu */
        th {
            text-align: center;
            background-color: #f2f2f2;
        }

        /* Judul di tengah */
        h2 {
            text-align: center;
        }

        /* Utility class untuk center text */
        .center {
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Judul laporan -->
    <h2>LAPORAN PDF - BEVAND</h2>

    <table>
        <thead>
            <tr>
                <!-- Header kolom -->
                <th>No</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>

        <tbody>
            <!-- Loop data dari Laravel -->
            @foreach($barangs as $b)
            <tr>
                <!-- Nomor urut otomatis -->
                <td class="center">{{ $loop->iteration }}</td>

                <!-- Data barang -->
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->nama_barang }}</td>

                <!-- Stok di tengah -->
                <td class="center">{{ $b->stok }}</td>

                <!-- Format harga rupiah -->
                <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
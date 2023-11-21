<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 5px 10px
        }

        h1 {
            text-align: center;
            margin-bottom: 3rem;
        }
    </style>
</head>

<body>
    <h1>Laporan Barang</h1>

    <table border="1" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Pemasok</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->pemasok->nama_pemasok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h6 class="text-center">
                            Data barang masuk tidak tersedia saat ini.
                        </h6>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>

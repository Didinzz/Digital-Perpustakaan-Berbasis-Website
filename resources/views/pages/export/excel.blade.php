<!-- resources/views/exports/invoices.blade.php -->
<!DOCTYPE html>
<html>

<head>
    {{-- <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: yellow;
            font-weight: bold;
        }

        .bg-light {
            background-color: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .bordered {
            border: 2px solid black;
        }
    </style> --}}
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>DATA BUKU</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Sampul Buku</th>
                <th>Judul Buku</th>
                <th>Kategori Buku</th>
                <th>Jumlah Buku</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td></td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->kategori->kategori_buku }}</td>
                    <td>{{ $buku->jumlah_buku }}</td>
                    <td>{{ $buku->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

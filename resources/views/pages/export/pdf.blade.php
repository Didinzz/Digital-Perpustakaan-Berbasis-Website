<!-- resources/views/exports/invoices.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <style>
        h2 {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            margin-top: 20px;
            width: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <h2>DATA BUKU</h2>
    <table>
        <thead>
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
                    <td><img src="{{ public_path('storage/' . $buku->cover_buku) }}" alt=""></td>
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

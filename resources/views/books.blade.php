
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Sales</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="/books" class="brand">Book Sales</a>

        <div class="nav-links">
            <a href="/books" class="active">Book</a>
            <a href="/genres">Genre</a>
            <a href="/authors">Author</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Daftar Buku</h1>
        <p class="subtitle">Daftar buku yang tersedia.</p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>{{ $item['stock'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
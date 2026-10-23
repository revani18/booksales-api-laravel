<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Author</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="/books" class="brand">Book Sales</a>

        <div class="nav-links">
            <a href="/books">Book</a>
            <a href="/genres">Genre</a>
            <a href="/authors" class="active">Author</a>
        </div>
    </nav>

    <main class="container">
        <h1 class="page-title">Data Author</h1>
        <p class="subtitle">Daftar penulis buku yang tersedia.</p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Author</th>
                        <th>Foto</th>
                        <th>Biografi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author['id'] }}</td>
                        <td>{{ $author['name'] }}</td>
                        <td>{{ $author['photo'] }}</td>
                        <td>{{ $author['bio'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
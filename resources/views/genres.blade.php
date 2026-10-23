<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Genre</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <a href="/books" class="brand">Book Sales</a>

        <div class="nav-links">
            <a href="/books">Book</a>
            <a href="/genres" class="active">Genre</a>
            <a href="/authors">Author</a>
        </div>
    </nav>

    <main class="container">
        <h1 class="page-title">Data Genre</h1>
        <p class="subtitle">Daftar genre buku yang tersedia.</p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Genre</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre['id'] }}</td>
                        <td>{{ $genre['name'] }}</td>
                        <td>{{ $genre['description'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
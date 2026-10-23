<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Author</title>
</head>
<body>
    <h1>Data Author Buku</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Author</th>
            <th>Foto</th>
            <th>Biografi</th>
        </tr>

        @foreach ($authors as $author)
        <tr>
            <td>{{ $author['id'] }}</td>
            <td>{{ $author['name'] }}</td>
            <td>{{ $author['photo'] }}</td>
            <td>{{ $author['bio'] }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
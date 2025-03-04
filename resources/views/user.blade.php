<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID level pengguna</th>
        </tr>
        @foreach ($user as $u)
            <tr>
                <td>{{$u->user_id}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->nama}}</td>
                <td>{{$u->level_id}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
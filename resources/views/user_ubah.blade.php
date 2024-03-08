<!DOCTYPE html>
<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user">Kembali</a>
    <form method="post" action="ubah_simpan/{{ $data->user_id }}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>Username</label>
        <input type="text" name="username" value="{{ $data->username }}">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $data->nama }}">
        <br>
        <label>Password</label>
        <input type="password" name="password" value="{{ $data->password }}">
        <br>
        <label>Level ID</label>
        <input type="number" name="level_id" value="{{ $data->level_id }}">
        <br><br>
        <input type="submit" name="btn btn-success" value="Ubah">
    </form>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <tittle>Data Stok Barang</tittle>
    </head>
    <body>
        <h1>Data Barang</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>ID Barang</th>
                <th>ID User</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->stok_id }}</td>
                <td>{{ $d->barang_id }}</td>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->stok_tanggal }}</td>
                <td>{{ $d->stok_jumlah }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>

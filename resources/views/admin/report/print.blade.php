<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Laporan Penonton Belum Masuk</h1>
    <hr>
        <table border="1" cellspacing=0>
            <thead>

            <tr>
                    <th>No</th>
                    <th>ID TIKET </th>
                    <th>Nama </th>
                    <th>ALAMAT</th>
                    <th>STATUS</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($belum as $no => $v )
                <tr>
                <td>{{++$no}}</td>
                <td>{{$v->id_tiket}}</td>
                <td>{{$v->nama}}</td>
                <td>{{$v->alamat}}</td>
                <td>
                    @if ($v->status == 0 )
                    Belum Masuk
                    @else 
                    sudah masuk
                    @endif
                
                </td>
                </tr>
                
                @endforeach
              
                
        </tbody>

        </table>
</body>
</html>
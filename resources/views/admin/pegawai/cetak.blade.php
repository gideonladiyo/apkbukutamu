<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Tamu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <center>
        <table>
            <tr>
                <td><img src="./login-asset/img/Logo_BPS.png" width="90" height="90"></td>
                <td>
                    <center>
                        <font size="3">BADAN PUSAT STATISTIK KABUPATEN PAMEKASAN</font><br>
                        <font size="2">Jl. Bonorogo No.34A, Tebana, Lawangan Daya, Kec. Pademawu, Kabupaten
                            Pamekasan, Jawa Timur 69323</font><br>
                        <font size="2"><i>Telepon: (0324) 328834 e-mail: https://pamekasankab.bps.go.id</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>

        </table>
        <b>LIST DATA PEGAWAI</b>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="font-size: 10px">#</th>
                    <th scope="col" style="font-size: 10px">NIP</th>
                    <th scope="col" style="font-size: 10px">Nama</th>
                    <th scope="col" style="font-size: 10px">Jenis Kelamin</th>
                    <th scope="col" style="font-size: 10px">Alamat</th>
                    <th scope="col" style="font-size: 10px">Devisi</th>
                    <th scope="col" style="font-size: 10px">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- Looping data pegawai --}}
                    @foreach ($pegawai as $item)
                <tr>
                    <th scope="row" style="font-size: 10px">{{ $no++ }}</th>
                    <td style="font-size: 10px">{{ $item->nip }}</td>
                    <td style="font-size: 10px">{{ $item->nama }}</td>
                    <td style="font-size: 10px">{{ $item->jk }}</td>
                    <td style="font-size: 10px">{{ $item->alamat }}</td>
                    <td style="font-size: 10px">{{ $item->nama_devisi }}</td>
                    <td style="font-size: 10px">{{ $item->nama_jabatan }}</td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </center>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        th {
            font-family: Arial;
            font-size: 14px
        }
        td {
            font-family: Arial;
            font-size: 12px;
        }
    </style>
</head>
<body>
	<div class="container-fluid">
		<center>
			<h4>RPP DARING 1</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead>
                <tr style="background-color:lightgray;">
                    <th scope="col">
                        <center>SEKOLAH</center>
                    </th>
                    <th scope="col">
                        <center>MATA PELAJARAN</center>
                    </th>
                    <th scope="col">
                        <center>KELAS/SEM/TP</center>
                    </th>
                    <th scope="col">
                        <center>ALOKASI WAKTU</center>
                    </th>
                </tr>
            </thead>
            <tbody align="center">
                <td>{{ $rpp->sekolah->nama_sekolah }}</td>
                <td>{{ $rpp->mapel->nama_mapel }}</td>
                <td>{{ $rpp->mapel->kelas }}/{{ $rpp->mapel->semester }}/{{ $rpp->mapel->tahun }}</td>
                <td>{{ $rpp->alokasi_waktu }}</td>
            </tbody>
		</table>

        <p style="font-size: 15px; font-weight:bold; margin:10px;">A.Tujuan Pembelajaran</p>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color:lightgray;">
                    <th scope="col">
                        <center>KD</center>
                    </th>
                    <th scope="col">
                        <center>IPK</center>
                    </th>
                    <th scope="col">
                        <center>TUJUAN</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <td style="text-align: justify; padding:15px;">
                    {!! $rpp->kompetensi_dasar !!}
                </td>
                <td style="text-align: justify; padding:15px;">
                    {!! $rpp->ipk !!}
                </td>
                <td style="text-align: justify; padding:15px; margin:20px;">
                    {!! $rpp->tujuan !!}
                </td>
            </tbody>
        </table>
	</div>
</body>
</html>
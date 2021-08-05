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

        {{-- start - tujuan pembelajaran --}}
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
        {{-- end - tujuan pembelajaran --}}

        {{-- start - materi --}}
        <p>B. Materi : {!! $rpp->materi_rpp !!}</p>
        
        <table class="table table-bordered">
            <thead>
                <tr style="background-color:lightgray;">
                    <th scope="col">
                        C.
                    </th>
                    <th scope="col">
                        PENDEKATAN
                    </th>
                    <th scope="col">
                        <center>STRATEGI</center>
                    </th>
                    <th scope="col">
                        <center>METODE</center>
                    </th>
                </tr>
            </thead>
            <tbody align="center">
                <td></td>
                <td>{{ $rpp->pendekatan }}</td>
                <td>{{ $rpp->strategi }}</td>
                <td>{{ $rpp->metode_rpp }}</td>
            </tbody>
        </table>
        {{-- end - materi --}}

        <table class="table table-bordered" style="padding: 0px; margin:0px;">
            <thead>
                <tr style="background-color:lightgray;">
                    <th scope="col">
                        D. Langkah - Langkah Pembelajaran
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {!! $rpp->langkah_rpp !!}
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p style="font-size: 15px; font-weight:bold; margin:10px;">E.Penilaian</p>
        <table class="table table-bordered" style="padding: 0px; margin:0px;">
            <thead>
                <tr style="background-color:lightgray;">
                    <th scope="col">
                        <center>Teknik</center>
                    </th>
                    <th scope="col">
                        <center>Alat</center>
                    </th>
                    <th scope="col">
                        <center>Bentuk</center>
                    </th>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    <td>{{ $rpp->teknik_materi }}</td>
                    <td>{{ $rpp->alat }}</td>
                    <td>{{ $rpp->bentuk }}</td>
                </tr>
            </tbody>
        </table>

        <!-- TTD -->
        <div>
            <p style="font-size: 15px; margin:40px;">Mengetahui,<br>Kepala Sekolah</p>
        </div>
        <br>
        <div>
            <p style="font-size: 15px; margin:40px;">{{ $rpp->sekolah->nama_kepsek }}<br>{{ $rpp->sekolah->nbm }}</p>
        </div>
        <div>
            <p style="font-size: 15px; margin:40px; text-align:right; margin-left:75%; margin-top:-210px; text-align:left;">Playen, {{ $tanggal }} <br>Guru Mata Pelajaran</p>
            <br><br>
            <p style="font-size: 15px; margin:40px; margin-left:75%; margin-top:-110px;">{{ $rpp->user->name }}<br>{{ $rpp->user->nbm_guru }}</p>
        </div>
</body>
</html>
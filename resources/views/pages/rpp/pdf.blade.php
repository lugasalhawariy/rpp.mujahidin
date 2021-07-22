<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial;
            font-size: 18px
        }

        .pos {
            position: absolute;
            z-index: 0;
            left: 0px;
            top: 0px
        }
    </style>

    <script src=""></script>
</head>

<body>
    <br>
    <br>
    <p style="text-align: center;">RPP DARING 1</p>
    <!-- Tabel 1 -->
    <div class="container">
        <div class="row">
            <br><br><br>
            <table class="table caption-top" border="" style="padding: 0px; margin:0px;">
                <thead>

                    <tr style="background-color:lightgray;">
                        <th scope="col">
                            <center>{{ $rpp->sekolah->nama_sekolah }}</center>
                        </th>
                        <th scope="col">
                            <center>{{ $rpp->mapel->nama_mapel }}</center>
                        </th>
                        <th scope="col">
                            <center>{{ $rpp->mapel->kelas }}/{{ $rpp->mapel->semester }}/{{ $rpp->mapel->tahun }}</center>
                        </th>


                        <th scope="col">
                            <center>{{ $rpp->alokasi_waktu }}</center>
                        </th>
                    </tr>
                </thead>
                <tbody align="center">

                    <td>{{ $rpp->sekolah->nama_sekolah }}</td>
                    <td>{{ $rpp->mapel->nama_mapel }}</td>
                    <td>{{ $rpp->mapel->kelas }}/{{ $rpp->mapel->semester }}/{{ $rpp->mapel->tahun }}</td>
                    <td>{{ $rpp->alokasi_waktu }}</td>

                </tbody>

        </div>
    </div>
    </table>
    <br><br><br>
    <p style="font-size: 15px; font-weight:bold; margin:10px;">A.Tujuan Pembelajaran</p>
    <!-- Tabel 2 -->
    <div class="container">
        <div class="row">
            <br><br><br>
            <table class="table caption-top" border="" style="padding: 0px; margin:0px;">
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

                    <td style="text-align: justify; padding:15px;">3.7 Membuat generalisasi luas permukaan dan volume berbagai bangun ruang sisi lengkung (tabung, kerucut, dan bola).
                        <br><br>
                        4.7 Menyelesaikan masalah kontekstual yang berkaitan dengan luas permukaan dan volume bangun ruang sisi lengkung (tabung, kerucut, dan bola), serta gabungan beberapa bangun ruang sisi lengkung.
                    </td>
                    <td style="text-align: justify; padding:15px;">3.7.1 Menentukan jaring – jaring bangun ruang sisi lengkung tabung.
                        <br>
                        3.7.3 Mencari rumus volume bangun ruang sisi lengkung tabung.
                        <br>
                        3.7.4 Menentukan jaring – jaring bangun ruang sisi lengkung kerucut.
                        <br>
                        3.7.5 Mencari rumus luas bangun ruang sisi lengkung kerucut.<br>
                        3.7.6 Mencari rumus volume bangun ruang sisi lengkung kerucut.<br>
                        3.7.7 Mencari rumus luas bangun ruang sisi lengkung bola.<br>
                        3.7.8 Mencari rumus volume bangun ruang sisi lengkung bola.<br>
                    </td>
                    <td style="text-align: justify; padding:15px;margin:20px;">Setelah melaksanakan kegiatan pembelajaran peserta didik dapat:
                        <br>
                        1. Menentukan jaring – jaring bangun ruang sisi lengkung tabung.
                        <br>
                        2. Mencari rumus luas bangun ruang sisi lengkung tabung.
                        <br>
                        3. Mencari rumus volume bangun ruang sisi lengkung tabung.
                        <br>
                        4. Menentukan jaring – jaring bangun ruang sisi lengkung kerucut.
                        <br>
                        5. Mencari rumus luas bangun ruang sisi lengkung kerucut.
                        <br>
                        6. Mencari rumus volume bangun ruang sisi lengkung kerucut.
                        <br>
                        7. Mencari rumus luas bangun ruang sisi lengkung bola.
                        <br>
                        8. Mencari rumus volume bangun ruang sisi lengkung bola.
                        <br>
                        9. Menyelesaikan masalah yang berkaitan dengan bangun ruang sisi lengkung tabung.
                        <br>
                        10. Menyelesaikan masalah yang berkaitan dengan bangun ruang sisi lengkung kerucut.
                        <br>
                        11. Menyelesaikan masalah yang berkaitan dengan bangun ruang sisi lengkung bola.

                    </td>
                </tbody>

        </div>
    </div>
    </table>
    <p style="color: transparent;">.</p>
    <p style="font-weight:bold; font-size: 15px; margin:10px;">B. Materi : Bangun Ruang Sisi Lengkung</p>
    <!-- Tabel 3 -->

    <!--Tabel 4-->
    <div class="container">
        <div class="row">
            <table class="table caption-top" border="" style="padding: 0px; margin:0px;">
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
                <tbody align="center">

                    <td style="color: transparent;">.</td>
                    <td style="font-style:italic">student centered approach</td>
                    <td>E-Learning</td>
                    <td>Pembelajaran Daring</td>

                </tbody>

        </div>
    </div>
    </table>
    <!--Tabel 5-->
    <p style="color: transparent;">.</p>
    <div class="container">
        <div class="row">
            <table class="table caption-top" border="" style="padding: 0px; margin:0px;">
                <thead>

                    <tr style="background-color:lightgray;">
                        <th scope="col">
                            D. Langkah - Langkah Pembelajaran
                        </th>


                <tbody>


                    <td>Pertemuan Pertama<br><br>
                        1. Pendahuluan<br>
                         Guru menyapa peserta didik, menyampaikan KD/IPK/ tujuan pembelajaran, dan memotivasi.<br><br>
                        2. Inti<br>
                         Guru menyampaikan materi melalui video yang sudah disediakan.<br>
                         Video 1 : Jaring – Jaring Bangun Ruang Sisi Lengkung<br>
                         Peserta didik mencermati video tersebut, bagi yang belum paham diperkenankan untuk bertanya kepada guru melalui pesan whattsap.<br>
                         Peserta didik mengikuti belajar/mengerjakan tugas/mengerjakan soal di google form.<br><br>

                        3. Penutup<br>
                         Guru memberi penguatan/ kesimpulan<br>
                         Guru memberi umpan balik/ apresiasi dan refleksi



                    </td>

                </tbody>

        </div>
    </div>
    </table>
    <br>
    <p style="font-size: 15px; font-weight:bold; margin:10px;">E.Penilaian</p>
    <!-- Tabel 5 -->
    <div class="container">
        <div class="row">
            <br><br><br>
            <table class="table caption-top" border="" style="padding: 0px; margin:0px;">
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

                    <td>Tes</td>
                    <td>Tes Online</td>
                    <td>Pilihan Ganda</td>


                </tbody>

        </div>
    </div>
    </table>
    <p style="color: transparent;">.</p>

    <!-- TTD -->
    <div class="container">
        <div class="row">
            <p style="font-size: 15px; margin:40px;">Mengetahui,<br>Kepala Sekolah</p>

        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <p style="font-size: 15px; margin:40px;">Agus Suroyo, S. Pd.I, M.Pd.I<br>NBM 1050762</p>

        </div>
    </div>


    <p style="font-size: 15px; margin:40px; text-align:right; margin-left:75%; margin-top:-210px; text-align:left;">Playen, 4 Januari 2021 <br>Guru Mata Pelajaran</p>
    <br>
    <p style="font-size: 15px; margin:40px; margin-left:75%; margin-top:-110px;">Ari Ernawati, S.Pd<br>NBM 1172356</p>
</body>


</html>
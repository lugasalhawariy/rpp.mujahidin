<div>
    <div class="main-content">
        <div class="container-fluid">
            {{-- panel/card for button --}}
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title" style="color:black; margin-top:7px; font-family:tahoma; "></h1>
                </div>
                {{-- tombol --}}
                <div class="row">
                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-plus-circle"></i> Buat RPP</button>
                    <a class='btn btn-success' href='#'><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a>
                    <a class='btn btn-danger' href='#'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                </div>
                {{-- end tombol panel for button --}}
                <hr>
            </div>
            {{-- end panel/card button --}}
    
            {{-- panel content --}}
            <div class="panel panel-info">
                <div class="panel-body">
                    {{-- table --}}
                    <table class="table caption-top">
                        {{-- thead table --}}
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">MATERI PRODUK</th>
                                <th scope="col">DI UNGGAH OLEH</th>
                                <th scope="col">PELAJARAN</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">CETAK</th>
                                <th scope="col">UBAH</th>
                                <th scope="col">HAPUS</th>
                            </tr>
                        </thead>
                        {{-- end thead table --}}
    
                        {{-- tbody table --}}
                        <tbody>
                            <tr class="text-center">
                                <td scope="row">1</td>
                                <td>Bahasa Inggirs</td>
                                <td>Tri Bima Sakty</td>
                                <td>Pancasila</td>
                                <td>XI</td>
                                <td><span class="badge rounded-pill bg-success text-dark">DI TERIMA</span></td>
                                <td><a href="#"><span class="badge rounded-pill bg-dark">CETAK</span></a></td>
                                <td><span class="badge rounded-pill bg-secondary">UBAH</span></td>
                                <td><span class="badge rounded-pill bg-danger"><i class="lnr lnr-trash"></i></span></td>
                            </tr>
                        </tbody>
                        {{-- end tbody table --}}
                    </table>
                    {{-- end table --}}
                </div>
            </div>
            {{-- end panel content --}}
        </div>
    </div>
</div>

{{-- style tambahan --}}
<link rel="stylesheet" href="backend/assets/css/style-guru.css">
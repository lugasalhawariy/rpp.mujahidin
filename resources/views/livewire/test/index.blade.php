<div>
    <div class="main-content">
        <div class="container-fluid">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Beranda</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i style="margin-top:15px;"class="fa fa-file"></i></span>
                            <p>
                                <span class="number">{{ $data_mapel }}</span>
                                <span class="title">Mata Pelajaran</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric">
                            <span  style="background-color: #5B7E4E;" class="icon"><i style="margin-top:15px;" class="fa fa-user"></i></span>
                            <p>
                                <span class="number">{{ $data_guru }}</span>
                                <span class="title">Data Guru</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric">
                            <span  style="background-color: #FFBF60;" class="icon"><i style="margin-top:15px;" class="fa fa-eye"></i></span>
                            <p>
                                <span class="number">{{ $data_rpp }}</span>
                                <span class="title">Data Laporan RPP</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

{{-- style tambahan --}}
<link rel="stylesheet" href="backend/assets/css/style-guru.css">
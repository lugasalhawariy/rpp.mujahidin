@extends('layouts.backend')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="text-center">Detail RPP {{ $data->user->name }}</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="text-danger">ID</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>{{ $data->id }}</h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-danger">NAMA PEMILIK</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>{{ $data->user->name }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="text-danger">SEKOLAH</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>{{ $data->sekolah->nama_sekolah ?? 'Data sekolah telah dihapus.'}}</h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-danger">MAPEL</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>{{ $data->mapel->nama_mapel ?? 'Data pelajaran telah dihapus.' }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="text-danger">KELAS</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>{{ $data->mapel->kelas ?? 'Data kelas telah dihapus.' }}</h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-danger">SEMESTER</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>{{ $data->mapel->semester ?? 'Data semester telah dihapus.'}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Alokasi Waktu</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->alokasi_waktu }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Pendekatan</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->pendekatan }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Strategi</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->strategi }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Metode Pembelajaran</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->metode_rpp }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Teknik Materi</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->teknik_materi }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Teknik Penilaian</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->teknik_penilaian }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Alat</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->alat }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Bentuk</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->bentuk }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Kompetensi Dasar</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->kompetensi_dasar }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>IPK</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->ipk }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Tujuan</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->tujuan }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Materi Pembelajaran</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->materi_rpp }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Langkah Pembelajaran</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ $data->langkah_rpp }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
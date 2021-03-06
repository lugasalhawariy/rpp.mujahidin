@extends('layouts.backend')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="text-center">BUAT RPP BARU</h4>
            </div>
            <div class="panel-body">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{ session('message') }}
                    </div>
                @endif
                {{-- form create rpp --}}
                <form action="{{ route('store.rpp') }}" class="container" method="POST">
                    @csrf
                    <div class="col-6">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">PELAJARAN</label>
                                <input type="hidden" name="user_id" value="#">
                                <input type="hidden" name="sekolah_id" value="#">
                                <select name="mapel_id" id="inputState" class="form-control">
                                    @foreach ($mapel as $item_mapel)
                                        <option value="{{ $item_mapel->id }}">{{ $item_mapel->nama_mapel }}</option>
                                    @endforeach
                                </select>
                                @error('mapel_id')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">ALOKASI WAKTU</label>
                                <input name="alokasi_waktu" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                                @error('alokasi_waktu')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">PENDEKATAN</label>
                                <input name="pendekatan" type="text" class="form-control" placeholder="Isikan pendekatan dengan benar">
                                @error('pendekatan')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">STRATEGI</label>
                                <input name="strategi" type="text" class="form-control" placeholder="Isikan strategi waktu dengan benar">
                                @error('strategi')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">METODE RPP</label>
                                <input name="metode_rpp" type="text" class="form-control" placeholder="Isikan metode pembelajaran dengan benar">
                                @error('metode_rpp')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">TEKNIK MATERI</label>
                                <input name="teknik_materi" type="text" class="form-control" placeholder="Isikan teknik materi dengan benar">
                                @error('teknik_materi')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">TEKNIK PENILAIAN</label>
                                <input name="teknik_penilaian" type="text" class="form-control" placeholder="Isikan teknik penilaian dengan benar">
                                @error('teknik_penilaian')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">ALAT</label>
                                <input name="alat" type="text" class="form-control" placeholder="Isikan alat dengan benar">
                                @error('alat')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">BENTUK</label>
                                <input name="bentuk" type="text" class="form-control" placeholder="Isikan bentuk dengan benar">
                                @error('bentuk')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">A. Kompetensi Dasar</label>
                                <textarea name="kompetensi_dasar" class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('kompetensi_dasar')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">B. IPK</label>
                                <textarea name="ipk" class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('ipk')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">C. Tujuan</label>
                                <textarea name="tujuan" class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('tujuan')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">D. Materi Pembelajaran</label>
                                <textarea name="materi_rpp" class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('materi_rpp')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">E. Langkah RPP</label>
                                <textarea name="langkah_rpp" class="ckeditor form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('langkah_rpp')
                                <span class="text-danger">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary form-control">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
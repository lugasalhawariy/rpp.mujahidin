@extends('layouts.backend')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2 class="text-center">EDIT DATA {{ $data->user->name }}</h4>
            </div>
            <div class="panel-body">
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{ session('message') }}
                    </div>
                @endif
                {{-- form create rpp --}}
                <form action="{{ route('update.rpp', $data->id) }}" class="container" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">PELAJARAN</label>
                                <input type="hidden" name="user_id" value="#">
                                <input type="hidden" name="sekolah_id" value="#">
                                <select name="mapel_id" id="inputState" class="form-control">
                                    @foreach ($mapel as $item_mapel)
                                        <option @if ($data->mapel_id == $item_mapel->id) selected @endif value="{{ $item_mapel->id }}">{{ $item_mapel->nama_mapel }}</option>
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
                                <input name="alokasi_waktu" type="text" class="form-control" value="{{ $data->alokasi_waktu }}">
                                @error('alokasi_waktu')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">PENDEKATAN</label>
                                <input name="pendekatan" type="text" class="form-control" value="{{ $data->pendekatan }}">
                                @error('pendekatan')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">STRATEGI</label>
                                <input name="strategi" type="text" class="form-control" value="{{ $data->strategi }}">
                                @error('strategi')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">METODE RPP</label>
                                <input name="metode_rpp" type="text" class="form-control" value="{{ $data->metode_rpp }}">
                                @error('metode_rpp')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">TEKNIK MATERI</label>
                                <input name="teknik_materi" type="text" class="form-control" value="{{ $data->teknik_materi }}">
                                @error('teknik_materi')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">TEKNIK PENILAIAN</label>
                                <input name="teknik_penilaian" type="text" class="form-control" value="{{ $data->teknik_penilaian }}">
                                @error('teknik_penilaian')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">ALAT</label>
                                <input name="alat" type="text" class="form-control" value="{{ $data->alat }}">
                                @error('alat')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">BENTUK</label>
                                <input name="bentuk" type="text" class="form-control" value="{{ $data->bentuk }}">
                                @error('bentuk')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group col-md-12">
                                <label for="kompetensiDasar">A. Kompetensi Dasar</label>
                                <textarea name="kompetensi_dasar" class="ckeditor form-control" id="kompetensiDasar" rows="3">
                                    {!! $data->kompetensi_dasar !!}
                                </textarea>
                                @error('kompetensi_dasar')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="ipk">B. IPK</label>
                                <textarea name="ipk" class="ckeditor form-control" id="ipk" rows="3">
                                    {!! $data->ipk !!}
                                </textarea>
                                @error('ipk')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tujuan">C. Tujuan</label>
                                <textarea name="tujuan" class="ckeditor form-control" id="tujuan" rows="3">
                                    {!! $data->tujuan !!}
                                </textarea>
                                @error('tujuan')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="materiRpp">D. Materi Pembelajaran</label>
                                <textarea name="materi_rpp" class="ckeditor form-control" id="materiRpp" rows="3">
                                    {!! $data->materi_rpp !!}
                                </textarea>
                                @error('materi_rpp')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="langkahRpp">E. Langkah RPP</label>
                                <textarea name="langkah_rpp" class="ckeditor form-control" id="langkahRpp" rows="3">
                                    {!! $data->langkah_rpp !!}
                                </textarea>
                                @error('langkah_rpp')
                                    <span class="text-danger">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary form-control">Update</button>
                            </div>
                            <div class="form-group col-md-12">
                                <a href="{{ route('index.rpp') }}" class="btn btn-secondary form-control">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
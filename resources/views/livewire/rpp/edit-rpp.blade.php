<div>
    <div class="container main-content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>{{ $nama_pemilik }}</h3>
            </div>
            <div class="panel-body">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" style="position: relative;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ session('message') }}
                </div>
            @endif
            {{-- form create rpp --}}
            <form action="#" class="container-fluid" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">SEKOLAH</label>
                            <input type="hidden" wire:model="user_id" value="#">
                            <select wire:model="sekolah_id" id="inputState" class="form-control">
                                @foreach ($sekolah as $item_sekolah)
                                    <option value="{{ $item_sekolah->id }}">{{ $item_sekolah->nama_sekolah }}</option>
                                @endforeach
                            </select>
                            @error('sekolah_id')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">PELAJARAN</label>
                            <select wire:model="mapel_id" id="inputState" class="form-control">
                                @foreach ($mapel as $item_mapel)
                                    <option value="{{ $item_mapel->id }}">{{ $item_mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                            @error('mapel_id')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">ALOKASI WAKTU</label>
                            <input wire:model="alokasi_waktu" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('alokasi_waktu')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">PENDEKATAN</label>
                            <input wire:model="pendekatan" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('pendekatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">STRATEGI</label>
                            <input wire:model="strategi" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('strategi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">METODE RPP</label>
                            <input wire:model="metode_rpp" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('metode_rpp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">TEKNIK MATERI</label>
                            <input wire:model="teknik_materi" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('teknik_materi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">TEKNIK PENILAIAN</label>
                            <input wire:model="teknik_penilaian" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('teknik_penilaian')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">ALAT</label>
                            <input wire:model="alat" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('alat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">BENTUK</label>
                            <input wire:model="bentuk" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('bentuk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">A. Kompetensi Dasar</label>
                            <textarea wire:model="kompetensi_dasar" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('kompetensi_dasar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">B. IPK</label>
                            <textarea wire:model="ipk" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('ipk')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">C. Tujuan</label>
                            <textarea wire:model="tujuan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('tujuan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">D. Materi Pembelajaran</label>
                            <textarea wire:model="materi_rpp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('materi_rpp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">E. Langkah RPP</label>
                            <textarea wire:model="langkah_rpp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('langkah_rpp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-primary" wire:click.prevent="update"
                                @error('sekolah_id')
                                    disabled
                                @enderror
                                @error('mapel_id')
                                    disabled
                                @enderror
                                @error('alokasi_waktu')
                                    disabled
                                @enderror
                                @error('pendekatan')
                                    disabled
                                @enderror
                                @error('strategi')
                                    disabled
                                @enderror
                                @error('metode_rpp')
                                    disabled
                                @enderror
                                @error('teknik_rpp')
                                    disabled
                                @enderror
                                @error('teknik_penilaian')
                                    disabled
                                @enderror
                                @error('alat')
                                    disabled
                                @enderror
                                @error('bentuk')
                                    disabled
                                @enderror
                                @error('kompetensi_dasar')
                                    disabled
                                @enderror
                                @error('ipk')
                                    disabled
                                @enderror
                                @error('tujuan')
                                    disabled
                                @enderror
                                @error('materi_rpp')
                                    disabled
                                @enderror
                                @error('langkah_rpp')
                                    disabled
                                @enderror
                                
                                >Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit data {{ $nama_mapel }}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {{-- form create rpp --}}
            <form action="#" class="container" method="POST">
                @csrf
                <div class="col-6">
                    <div class="row">
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">ALOKASI WAKTU</label>
                            <input wire:model="alokasi_waktu" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('alokasi_waktu')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">PENDEKATAN</label>
                            <input wire:model="pendekatan" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('pendekatan')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">STRATEGI</label>
                            <input wire:model="strategi" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('strategi')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">METODE RPP</label>
                            <input wire:model="metode_rpp" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('metode_rpp')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">TEKNIK MATERI</label>
                            <input wire:model="teknik_materi" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('teknik_materi')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">TEKNIK PENILAIAN</label>
                            <input wire:model="teknik_penilaian" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('teknik_penilaian')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">ALAT</label>
                            <input wire:model="alat" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('alat')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">BENTUK</label>
                            <input wire:model="bentuk" type="text" class="form-control" placeholder="Isikan alokasi waktu dengan benar">
                            @error('bentuk')
                                {{ $message }}
                            @enderror
                        </div>
                        <br>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">A. Kompetensi Dasar</label>
                            <textarea wire:model="kompetensi_dasar" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('kompetensi_dasar')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">B. IPK</label>
                            <textarea wire:model="ipk" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('ipk')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">C. Tujuan</label>
                            <textarea wire:model="tujuan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('tujuan')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">D. Materi Pembelajaran</label>
                            <textarea wire:model="materi_rpp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('materi_rpp')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">E. Langkah RPP</label>
                            <textarea wire:model="langkah_rpp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('langkah_rpp')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="update"
        
        @error('nama_mapel')
            disabled
        @enderror
        @error('kelas')
            disabled
        @enderror
        @error('semester')
            disabled
        @enderror
        @error('tahun')
            disabled
        @enderror
        
        >Save changes</button>
        </div>
    </div>
    </div>
</div>
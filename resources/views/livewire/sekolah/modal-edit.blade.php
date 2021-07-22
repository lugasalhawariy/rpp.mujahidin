<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit data {{ $nama_sekolah }}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="#" wire:submit.prevent="addItem">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-10">
                        <input wire:model="nama_sekolah" type="text" class="form-control" placeholder="Masukan nama sekolah">
                        @error('nama_sekolah')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NSS</label>
                    <div class="col-sm-10">
                        <input wire:model="nss" type="text" class="form-control" placeholder="Nomor Statik Sekolah">
                        @error('nss')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NPSN</label>
                    <div class="col-sm-10">
                        <input wire:model="npsn" type="text" class="form-control" placeholder="Nomor Pokok Sekolah Nasional">
                        @error('npsn')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <select wire:model="status_sekolah" id="inputState" class="form-control">
                                <option @if ($status_sekolah === 'swasta') selected @endif value="swasta">Swasta</option>
                                <option @if ($status_sekolah === 'negeri') selected @endif value="negeri">Negeri</option>
                            </select>
                            @error('status_sekolah')
                                <small class="mt-2 text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <textarea wire:model="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('alamat')
                                <small class="mt-2 text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NBM</label>
                    <div class="col-sm-10">
                        <input wire:model="nbm" type="text" class="form-control" id="inputPassword3" placeholder="Nomor Baku Muhammadiyah">
                        @error('nbm')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Kepala Sekolah</label>
                    <div class="col-sm-10">
                        <input wire:model="nama_kepsek" type="text" class="form-control" id="inputPassword3" placeholder="Nama Kepala Sekolah">
                        @error('nama_kepsek')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <input wire:model="desa" type="text" class="form-control" id="inputPassword3" placeholder="Desa/Kelurahan">
                        @error('desa')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input wire:model="kecamatan" type="text" class="form-control" id="inputPassword3" placeholder="Kecamatan">
                        @error('kecamatan')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <input wire:model="kabupaten" type="text" class="form-control" id="inputPassword3" placeholder="Kabupaten/Kota">
                        @error('kabupaten')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Akreditasi</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <select wire:model="akreditasi" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option @if ($akreditasi == 'A') selected @endif value="A">A</option>
                                <option @if ($akreditasi == 'B') selected @endif value="B">B</option>
                                <option @if ($akreditasi == 'C') selected @endif value="C">C</option>
                                <option @if ($akreditasi == 'D') selected @endif value="D">D</option>
                            </select>
                            @error('akreditasi')
                                <small class="mt-2 text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="update"
        
        @error('nama_sekolah')
            disabled
        @enderror
        @error('nss')
            disabled
        @enderror
        @error('npsn')
            disabled
        @enderror
        @error('alamat')
            disabled
        @enderror
        @error('desa')
            disabled
        @enderror
        @error('kecamatan')
            disabled
        @enderror
        @error('kabupaten')
            disabled
        @enderror
        @error('nama_kepsek')
            disabled
        @enderror
        @error('nmb')
            disabled
        @enderror
        
        >Save changes</button>
        </div>
    </div>
    </div>
</div>
<div>
    <div class="panel animate__animated animate__headShake">
        <div class="panel-body">
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
                        <input wire:model="nss" type="number" class="form-control" placeholder="Nomor Statik Sekolah">
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
                        <input wire:model="npsn" type="number" class="form-control" placeholder="Nomor Pokok Sekolah Nasional">
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
                                <option selected>Choose...</option>
                                <option value="swasta">Swasta</option>
                                <option value="negeri">Negeri</option>
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
                        <input wire:model="nbm" type="number" class="form-control" id="inputPassword3" placeholder="Nomor Baku Muhammadiyah">
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
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
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
                        <button type="submit" class="btn btn-primary" 
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
                        
                        >Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

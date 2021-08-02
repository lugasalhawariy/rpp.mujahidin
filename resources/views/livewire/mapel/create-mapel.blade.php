<div>
    <div class="panel animate__animated animate__headShake">
        <div class="panel-body">
            <form method="POST" action="#" wire:submit.prevent="addItem">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Mapel</label>
                    <div class="col-sm-10">
                        <input type="hidden" wire:model="sekolah_id" value="#">
                        <input wire:model="nama_mapel" type="text" class="form-control" placeholder="Masukan Nama Mata Pelajaran">
                        @error('nama_mapel')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select wire:model="kelas" id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option value="VII">7 (tujuh)</option>
                            <option value="VIII">8 (delapan)</option>
                            <option value="IX">9 (sembilan)</option>
                        </select>
                        @error('kelas')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input wire:model="tahun" type="text" class="form-control" placeholder="contoh: 2019/2020">
                        @error('tahun')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <select wire:model="semester" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="II">Semester Genap</option>
                                <option value="I">Semester Ganjil</option>
                            </select>
                            @error('semester')
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
                        
                        >Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

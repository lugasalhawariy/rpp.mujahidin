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
            <form method="POST" action="#">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Mapel</label>
                    <div class="col-sm-10">
                        <input type="hidden" wire:model="sekolah_id" value="#">
                        <input wire:model="nama_mapel" type="text" class="form-control" placeholder="Masukan nama sekolah">
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
                        <select wire:ignore wire:model="kelas" id="inputState" class="form-control">
                            <option @if ($kelas == 'VII') selected @endif value="VII">7 (tujuh)</option>
                            <option @if ($kelas == 'VIII') selected @endif value="VIII">8 (delapan)</option>
                            <option @if ($kelas == 'IX') selected @endif value="IX">9 (sembilan)</option>
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
                        <input wire:model="tahun" type="text" class="form-control" placeholder="Nomor Statik Sekolah">
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
                            <select wire:ignore wire:model="semester" id="inputState" class="form-control">
                                <option @if ($semester == 'I') selected @endif value="I">Semester Genap</option>
                                <option @if ($semester == 'II') selected @endif value="II">Semester Ganjil</option>
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
                        @if(session('message'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> {{ session('message') }}
                            </div>
                        @endif
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
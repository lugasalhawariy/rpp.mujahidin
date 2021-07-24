<div>
    <div class="panel animate__animated animate__headShake">
        <div class="panel-body">
            <form method="POST" action="#" wire:submit.prevent="addItem">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Role</label>
                    <div class="col-sm-10 col-md-6">
                        <input wire:model="name" type="text" class="form-control" placeholder="Masukan Nama Role">
                        @error('name')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div>
                            <button type="submit" class="btn btn-primary" 
                            @error('name')
                                disabled
                            @enderror
                            
                            >Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

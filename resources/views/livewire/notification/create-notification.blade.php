<div>
    <div class="panel animate__animated animate__headShake">
        <div class="panel-body">
            <form method="POST" action="#" wire:submit.prevent="addItem">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title:</label>
                    <div class="col-sm-10">
                        <input type="hidden" wire:model="user_id" value="#">
                        <input wire:model="title" type="text" class="form-control" placeholder="Judul Pesan">
                        @error('title')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kadaluarsa:</label>
                    <div class="col-sm-10">
                        <input wire:model="expired" type="date" class="form-control" placeholder="Judul Pesan">
                        @error('expired')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kirim ke:</label>
                    <div class="col-sm-10">
                        <select wire:model="role_id" id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('kelas')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Isi Pesan</label>
                    <div class="col-sm-10">
                        <textarea wire:model="body" type="text" class="form-control">
                        </textarea>
                        @error('body')
                            <small class="mt-2 text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-primary" 
                        @error('title')
                            disabled
                        @enderror
                        @error('body')
                            disabled
                        @enderror
                        
                        >Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile {{ $user->name }} (nip: {{ $user->nip ?? "masih kosong" }})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" readonly class="form-control" wire:model="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Your Name:</label>
                            <input type="text" class="form-control" wire:model="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->username }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Nomor Telepon:</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->no_telp }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="recipient-name" class="col-form-label">Tanggal Lahir:</label>
                            <input type="date" class="form-control" name="name" value="{{ $user->tgl_lahir }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Alamat:</label>
                            <textarea class="form-control" id="message-text">
                                {{ $user->alamat }}
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="sekolah" class="col-form-label">Sekolah:</label>
                            <select name="sekolah_id" class="form-control">
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
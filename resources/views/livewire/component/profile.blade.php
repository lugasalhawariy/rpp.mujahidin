<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile {{ $name }} (nip: {{ $nip ?? "masih kosong" }})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                    <form method="POST" class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" readonly class="form-control" wire:model="email">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email" class="col-form-label">Sekolah:</label>
                            <input type="text" readonly class="form-control" wire:model="sekolah_id" @if (auth()->user()->hasRole('superadmin')) placeholder="kamu adalah superadmin, tidak memiliki sekolah" @endif>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Your Name:</label>
                            <input type="text" id="name" class="form-control" wire:model="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" id="username" class="form-control" wire:model="username">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_telp" class="col-form-label">Nomor Telepon:</label>
                            <input type="number" id="no_telp" class="form-control" wire:model="no_telp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir" class="col-form-label">Tanggal Lahir:</label>
                            <input type="date" id="tgl_lahir" class="form-control" wire:model="tgl_lahir">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nbm" class="col-form-label">NBM:</label>
                            <input type="text" id="nbm" class="form-control" wire:model="nbm_guru">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nip" class="col-form-label">NIP:</label>
                            <input type="text" id="nip" class="form-control" wire:model="nip_guru">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="alamat" class="col-form-label">Alamat:</label>
                            <textarea class="form-control" id="alamat" wire:model="alamat">
                            </textarea>
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label for="sekolah" class="col-form-label">Sekolah:</label>
                            <select wire:ignore wire:model="sekolah_id" id="sekolah" class="form-control">
                                @foreach ($sekolah as $item)
                                    <option @if (auth()->user()->sekolah_id === $item->id) selected @endif value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="form-group col-md-12">
                            <label for="riwayat_pendidikan" class="col-form-label">Riwayat Pendidikan:</label>
                            <textarea class="form-control" id="riwayat_pendidikan" wire:model="riwayat_pendidikan">
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="update">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

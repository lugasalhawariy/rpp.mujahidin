<div>
    <div class="main-content">
        <div class="container-fluid">
            {{-- panel/card for button --}}
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title" style="color:black; margin-top:7px; font-family:tahoma; "></h1>
                </div>
                {{-- tombol --}}
                <div class="row">
                    @if ($show)
                        <button wire:click="$set('show', false)" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-circle-minus"></i> Cancel</button>
                    @else
                        <button wire:click="$set('show', true)" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-plus-circle"></i> Tambah Sekolah</button>
                    @endif
                    <a class='btn btn-success' href='#'><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a>
                    <a class='btn btn-danger' href='#'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                </div>
                {{-- end tombol panel for button --}}
                <hr>
            </div>
            {{-- end panel/card button --}}

            @if ($show)
                @livewire('sekolah.create-sekolah')
            @endif
    
            {{-- panel content --}}
            <div class="panel panel-info">
                <div class="mb-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="Searching something...">
                </div>
                <div class="panel-body">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                    @if (session('delete'))
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                    {{-- table --}}
                    <table class="table caption-top">
                        {{-- thead table --}}
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Nama Sekolah</th>
                                <th scope="col">NSS</th>
                                <th scope="col">NPSN</th>
                                <th scope="col">Akreditasi</th>
                                <th scope="col">Status</th>
                                <th scope="col">NBM</th>
                                @can('ubah-sekolah')
                                <th scope="col">UBAH</th>
                                @endcan
                                @can('hapus-sekolah')
                                <th scope="col">HAPUS</th>
                                @endcan
                            </tr>
                        </thead>
                        {{-- end thead table --}}
    
                        {{-- tbody table --}}
                        <tbody>
                            @foreach ($sekolah as $index => $item)
                            <tr class="text-center">
                                <td scope="row">{{ $index+1 }}</td>
                                <td>{{ $item->nama_sekolah }}</td>
                                <td>{{ $item->nss }}</td>
                                <td>{{ $item->npsn }}</td>
                                <td>{{ $item->akreditasi }}</td>
                                <td><span class="badge rounded-pill bg-secondary text-dark">{{ $item->status_sekolah }}</span></td>
                                <td>{{ $item->nbm }}</td>
                                @can('ubah-sekolah')
                                <td><button wire:click="edit({{ $item->id }})" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#editSekolah">UBAH</button></td>
                                {{-- add modal edit --}}
                                <div>
                                    @include('livewire.sekolah.modal-edit')
                                </div>
                                @endcan

                                @can('hapus-sekolah')
                                <td>
                                    <button wire:click="delete({{ $item->id }})" class="badge rounded-pill bg-danger">
                                        <i class="lnr lnr-trash"></i>
                                    </button>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- end tbody table --}}
                    </table>
                    {{ $sekolah->links() }}
                    {{-- end table --}}
                </div>
            </div>
            {{-- end panel content --}}
        </div>
    </div>
</div>

{{-- style tambahan --}}
<link rel="stylesheet" href="backend/assets/css/style-guru.css">
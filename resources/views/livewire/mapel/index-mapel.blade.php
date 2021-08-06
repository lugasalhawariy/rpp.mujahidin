<div>
    <div class="main-content">
        <div class="container-fluid">
            @can('tambah-mapel')
                {{-- panel/card for button --}}
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title" style="color:black; margin-top:7px; font-family:tahoma; "></h1>
                </div>
                {{-- tombol --}}
                <div class="row">
                    @if ($show)
                        <button wire:click="$set('show', false)" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fas fa-minus-square"></i> Cancel</button>
                    @else
                        <button wire:click="$set('show', true)" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Tambah Mapel</button>
                    @endif
                    {{-- <a class='btn btn-success' href='#'><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a>
                    <a class='btn btn-danger' href='#'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a> --}}
                </div>
                {{-- end tombol panel for button --}}
                <hr>
            </div>
            {{-- end panel/card button --}}
            @endcan

            @if ($show)
                @livewire('mapel.create-mapel')
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
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">UBAH</th>
                                <th scope="col">HAPUS</th>
                            </tr>
                        </thead>
                        {{-- end thead table --}}
    
                        {{-- tbody table --}}
                        <tbody>
                            @foreach ($mapel as $index => $item)
                            {{-- admin hanya akan melihat data mapel dari sekolahnya --}}
                            @if ($item->sekolah_id === auth()->user()->sekolah_id)
                            <tr class="text-center">
                                <td scope="row">{{ $index+1 }}</td>
                                <td>{{ $item->nama_mapel }}</td>
                                <td>{{ $item->sekolah->nama_sekolah }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->semester }}</td>
                                <td><span class="badge rounded-pill bg-secondary text-dark">{{ $item->tahun }}</span></td>
                                <td><button wire:click="edit({{ $item->id }})" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#editSekolah">UBAH</button></td>
                                {{-- add modal edit --}}
                                <div>
                                    @include('livewire.mapel.modal-edit')
                                </div>

                                <td>
                                    <button wire:click="delete({{ $item->id }})" class="badge rounded-pill bg-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        {{-- end tbody table --}}
                    </table>
                    {{ $mapel->links() }}
                    {{-- end table --}}
                </div>
            </div>
            {{-- end panel content --}}
        </div>
    </div>
</div>

{{-- style tambahan --}}
<link rel="stylesheet" href="backend/assets/css/style-guru.css">
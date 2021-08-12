<div>
    <div class="main-content">
        <div class="container-fluid">
            {{-- panel content --}}
            <div class="panel panel-info">
                <div class="text-center panel-heading">
                    TEMPAT SAMPAH DATA RPP
                </div>
                <br>
                <div class="mb-3">
                    <input wire:model="search" type="text" class="form-control" placeholder="Cari berdasarkan Sekolah/NSS/NPSN/Kepala sekolah/Nama pelajaran/Tahun">
                </div>
                <div class="panel-body">
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                    @if(session('delete'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Delete!</strong> {{ session('delete') }}
                        </div>
                    @endif
                    {{-- table --}}
                    <table class="table caption-top">
                        {{-- thead table --}}
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Status</th>
                                <th scope="col">Kembalikan</th>
                                <th scope="col">Delete Permanen</th>
                            </tr>
                        </thead>
                        {{-- end thead table --}}
    
                        {{-- tbody table --}}
                        <tbody>
                            @foreach ($rpp as $index => $item)
                                @if ($item->sekolah_id === auth()->user()->sekolah_id)
                                    <tr class="text-center">
                                        <td scope="row">{{ $index+1 }}</td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            {{ $item->sekolah->nama_sekolah ?? 'Sekolah telah dihapus, tolong ubah terlebih dahulu.'}}
                                        </td>
                                        <td>
                                            {{ $item->mapel->nama_mapel ?? 'Sekolah telah dihapus, tolong ubah terlebih dahulu.'}}
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill 
                                            @if ($item->status === 'success')
                                                bg-danger
                                            @else
                                                bg-info
                                            @endif">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        {{-- jika dia pemilik rpp maka dia bisa lakukan restore --}}
                                        <td>
                                            <button wire:click="restore({{ $item->id }})" class="badge rounded-pill bg-primary">
                                                <i class="fas fa-trash-restore"></i>
                                            </button>
                                        </td>
                                        {{-- end logic restore --}}
                                        {{-- jika dia pemilik rpp maka dia bisa lakukan delete permanen --}}
                                        <td>
                                            <button wire:click="delete({{ $item->id }})" class="badge rounded-pill bg-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                        {{-- end logic delete permanent --}}
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        {{-- end tbody table --}}
                    </table>
                    {{-- {{ $rpp->links() }} --}}
                    {{-- end table --}}
                </div>
            </div>
            {{-- end panel content --}}
        </div>
    </div>
</div>

{{-- style tambahan --}}
<link rel="stylesheet" href="{{ asset('backend/assets/css/style-guru.css') }}">
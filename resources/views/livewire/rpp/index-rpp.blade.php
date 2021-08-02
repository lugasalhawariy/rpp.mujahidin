<div>
    <div class="main-content">
        <div class="container-fluid">
            @can('tambah-rpp')
                {{-- panel/card for button --}}
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h1 class="panel-title" style="color:black; margin-top:7px; font-family:tahoma; "></h1>
                    </div>
                    {{-- tombol --}}
                    <div class="row">
                        <a class='btn btn-info' href='{{ route('create.rpp') }}'><i class="lnr lnr-plus-circle"></i> Tambah RPP</a>
                        <a class='btn btn-success' href='#'><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a>
                        <a class='btn btn-danger' href='#'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>
                    </div>
                    {{-- end tombol panel for button --}}
                    <hr>
                </div>
                {{-- end panel/card button --}}
            @endcan
    
            {{-- panel content --}}
            <div class="panel panel-info">
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
                                <th scope="col">Nama Guru</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col">Status</th>
                                <th scope="col">Perbaharui</th>
                                @can('detail-rpp')
                                <th scope="col">DETAIL</th>
                                @endcan
                                @can('ubah-rpp')
                                <th scope="col">EDIT</th>
                                @endcan
                                @can('cetak-rpp')
                                <th scope="col">PDF</th>
                                @endcan
                                @can('hapus-rpp')
                                <th scope="col">HAPUS</th>
                                @endcan
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
                                        <td>
                                            {{ $item->updated_at->diffForHumans() }}
                                        </td>
                                        @can('detail-rpp')
                                        <td>
                                            <a href="{{ route('show.rpp', $item->id) }}" class="btn btn-sm bg-warning">
                                                DETAIL
                                            </a>
                                        </td>
                                        @endcan
                                        @can('ubah-rpp')
                                        <td>
                                            <a href="{{ route('edit.rpp', $item->id) }}" class="btn btn-sm bg-info">
                                                EDIT
                                            </a>
                                        </td>
                                        @endcan
                                        @can('cetak-rpp')
                                        <td>
                                            <a href="{{ route('pdf.rpp', $item->id) }}" class="btn btn-sm bg-danger">
                                                DOWNLOAD PDF
                                            </a>
                                        </td>
                                        @endcan
                                        @can('hapus-rpp')
                                        <td>
                                            <button wire:click="delete({{ $item->id }})" class="badge rounded-pill bg-danger">
                                                <i class="lnr lnr-trash"></i>
                                            </button>
                                        </td>
                                        @endcan
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        {{-- end tbody table --}}
                    </table>
                    {{ $rpp->links() }}
                    {{-- end table --}}
                </div>
            </div>
            {{-- end panel content --}}
        </div>
    </div>
</div>

{{-- style tambahan --}}
<link rel="stylesheet" href="backend/assets/css/style-guru.css">
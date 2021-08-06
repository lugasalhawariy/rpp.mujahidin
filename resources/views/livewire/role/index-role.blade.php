<div>
    <div class="main-content">
        <div class="container-fluid">

            @hasrole('superadmin')
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
                            <button wire:click="$set('show', true)" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="lnr lnr-plus-circle"></i> Tambah Role</button>
                        @endif
                        {{-- <a class='btn btn-success' href='#'><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a>
                        <a class='btn btn-danger' href='#'><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a> --}}
                    </div>
                    {{-- end tombol panel for button --}}
                    <hr>
                </div>
                {{-- end panel/card button --}}

                @if ($show)
                    @livewire('role.create-role')
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
                        @if(session('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Failed!</strong> {{ session('failed') }}
                            </div>
                        @endif
                        @if(session('delete'))
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Warning!</strong> {{ session('delete') }}
                            </div>
                        @endif
                        {{-- table --}}
                        <table class="table caption-top">
                            {{-- thead table --}}
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Role</th>
                                    <th scope="col">Permisson</th>
                                    <th scope="col">Perbarui</th>
                                    <th scope="col">UBAH</th>
                                    <th scope="col">HAPUS</th>
                                </tr>
                            </thead>
                            {{-- end thead table --}}
                            {{-- tbody table --}}
                            <tbody>
                                @foreach ($roles as $index => $item)
                                <tr class="text-center">
                                    <td scope="row">{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ implode(', ', $item->getPermissionNames()->toArray()) }}</td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>
                                    {{-- button --}}
                                    <td>
                                        <a href="{{ route('edit.permission', $item->id) }}" class="btn btn-sm bg-warning">
                                            UBAH
                                        </a>
                                    </td>

                                    <td>
                                        <button confirm wire:click="delete({{ $item->id }})" class="badge rounded-pill bg-danger">
                                            <i class="lnr lnr-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- end tbody table --}}
                        </table>
                        {{-- {{ $roles->links() }} --}}
                        {{-- end table --}}
                    </div>
                </div>
                {{-- end panel content --}}
            @endhasrole

            {{-- panel content --}}
            <div class="panel panel-info">
                <div class="mb-3">
                    <input wire:model="search_user" type="text" class="form-control" placeholder="Searching something...">
                </div>
                <div class="panel-body">
                    {{-- table --}}
                    <table class="table caption-top">
                        {{-- thead table --}}
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No</th>
                                <th scope="col">User</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Perbarui</th>
                                <th scope="col">Verifikasi</th>
                                <th scope="col">UBAH</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        {{-- end thead table --}}
                        {{-- tbody table --}}
                        <tbody>
                            @foreach ($users as $index => $item)
                                {{-- jika user satu sekolah, maka bisa ngedit / dia seorang superadmin --}}
                                @if ($item->sekolah_id == auth()->user()->sekolah_id || auth()->user()->hasRole('superadmin'))
                                    <tr class="text-center">
                                        <td scope="row">{{ $index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ implode(', ', $item->getRoleNames()->toArray()) }}</td>
                                        <td>{{ $item->sekolah->nama_sekolah ?? '-' }}</td>
                                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                                        <td>
                                            @if ($item->email_verified_at !== null)
                                                {{ $item->email_verified_at->format('d M Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        {{-- button --}}
                                        @if (!$item->hasRole('superadmin'))
                                        <td>
                                            <a href="{{ route('edit.role', $item->id) }}" class="btn btn-sm bg-primary">
                                                Ganti Role
                                            </a>
                                        </td>
                                        @else
                                        <td>
                                            <small>
                                                <i class="text-danger">
                                                    anda tidak memiliki akses
                                                </i>
                                            </small>
                                        </td>
                                        @endif
                                        
                                        <td>
                                            @hasanyrole('superadmin|admin')
                                            @if ($item->hasRole('superadmin'))
                                                <small>
                                                    <i class="text-danger">
                                                        anda tidak memiliki akses
                                                    </i>
                                                </small>
                                            @else
                                                @if ($item->email_verified_at !== null)
                                                <button wire:click="blokir({{ $item->id }})" class="btn btn-danger badge rounded-pill">
                                                    Blokir
                                                </button>
                                                @else
                                                <button wire:click="aktivasi({{ $item->id }})" class="btn btn-success badge rounded-pill">
                                                    Aktifkan
                                                </button>
                                                @endif
                                            @endif
                                            @endhasanyrole
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        {{-- end tbody table --}}
                    </table>
                    {{ $users->links() }}
                    {{-- end table --}}
                </div>
            </div>
            {{-- end panel content --}}
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ secure_asset('backend/assets/css/style-guru.css') }}">
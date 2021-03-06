<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                @if(auth()->user()->can('kelola-user') || auth()->user()->email == 'superadmin@gmail.com')
                <li><a href="{{ route('index.role') }}" class="{{ Route::currentRouteNamed('index.role') ? 'active' : '' }}"><i class="fas fa-users-cog"></i> <span>Kelola Izin</span></a></li>
                @endif
                @can('lihat-sekolah')
                {{-- link to sekolah --}}
                <li><a href="{{ route('index.sekolah') }}" class="{{ Route::currentRouteNamed('index.sekolah') ? 'active' : '' }}"><i class="fas fa-school"></i> <span>Sekolah</span></a></li>
                @endcan
                @can('lihat-mapel')    
                {{-- link to mapel --}}
                <li><a href="{{ route('index.mapel') }}" class="{{ Route::currentRouteNamed('index.mapel') ? 'active' : '' }}"><i class="fas fa-book"></i> <span>Mata Pelajaran</span></a></li>
                @endcan

                @can('lihat-rpp')
                <li><a href="{{ route('index.rpp') }}" class="{{ Route::currentRouteNamed('index.rpp') || Route::currentRouteNamed('create.rpp') || Route::currentRouteNamed('edit.rpp') ? 'active' : '' }}"><i class="fas fa-file-alt"></i> <span>Kelola RPP</span></a></li>
                @endcan

                @if (auth()->user()->email == 'sekolahmuhammadiyahgk@gmail.com')
                @unlessrole('superadmin')
                    <li><a href="{{ route('setsuperadmin') }}" class="{{ Route::currentRouteNamed('index.mapel') ? 'active' : '' }}"><i class="lnr lnr-chart-bars"></i> <span>Jadikan Super Admin</span></a></li>
                    @endunlessrole
                @endif

                <li><a href="{{ route('index.notif') }}"><i class="far fa-bell"></i> <span>Notifications</span></a></li>
                
                <li><a href="{{ route('index.silabus') }}"><i class="fas fa-file-upload"></i> <span>Silabus</span></a></li>

                @hasrole('guru')
                <li><a href="{{ route('index.trash') }}"><i class="fas fa-trash-alt"></i> <span>Tempat Sampah</span></a></li>
                @endhasrole

                {{-- <li>
                    <button href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"><i class="lnr lnr-exit"></i>Logout
                    </button>
                </li> --}}

            </ul>
        </nav>
    </div>
</div>


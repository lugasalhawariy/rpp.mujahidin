<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="#"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                @if(auth()->user()->can('kelola user') || auth()->user()->email == 'superadmin@gmail.com')
                <li><a href="{{ route('index.role') }}" class="{{ Route::currentRouteNamed('index.role') ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Kelola Izin</span></a></li>
                @endif
                @can('lihat data sekolah')
                {{-- link to sekolah --}}
                <li><a href="{{ route('index.sekolah') }}" class="{{ Route::currentRouteNamed('index.sekolah') ? 'active' : '' }}"><i class="lnr lnr-code"></i> <span>Sekolah</span></a></li>
                @endcan
                @can('lihat data mapel')    
                {{-- link to mapel --}}
                <li><a href="{{ route('index.mapel') }}" class="{{ Route::currentRouteNamed('index.mapel') ? 'active' : '' }}"><i class="lnr lnr-chart-bars"></i> <span>Mata Pelajaran</span></a></li>
                @endcan

                @can('lihat data rpp')
                <li><a href="{{ route('index.rpp') }}" class="{{ Route::currentRouteNamed('index.rpp') || Route::currentRouteNamed('create.rpp') || Route::currentRouteNamed('edit.rpp') ? 'active' : '' }}"><i class="lnr lnr-cog"></i> <span>Kelola RPP</span></a></li>
                @endcan

                @if (auth()->user()->email == 'superadmin@gmail.com')
                    @unlessrole('superadmin')
                    <li><a href="{{ route('setsuperadmin') }}" class="{{ Route::currentRouteNamed('index.mapel') ? 'active' : '' }}"><i class="lnr lnr-chart-bars"></i> <span>Jadikan Super Admin</span></a></li>
                    @endunlessrole
                @endif

                <li><a href="#" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
            </ul>
        </nav>
    </div>
</div>


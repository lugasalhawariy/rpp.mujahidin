<div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="/"><img src="{{ asset('backend/assets/img/almujahid.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    @hasanyrole($role_all)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="lnr lnr-alarm"></i>
                            @if ($jumlah_pesan !== 0)
                                <span class="badge bg-danger">{{ $jumlah_pesan }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu notifications">
                            @foreach ($pesan as $item)
                                @if ($item->expired > now())
                                <li>
                                    <a href="#" class="notification-item">
                                        <span class="dot @if ($item->user_id == auth()->user()->id) bg-warning @else bg-danger @endif"></span>
                                        {{ $item->title }}
                                    </a>
                                </li>
                                @endif
                            @endforeach
                            <li><a href="{{ route('index.notif') }}" class="more">See all notifications</a></li>
                        </ul>
                    </li>
                    @endhasanyrole
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ gravatar()->avatar(auth()->user()->email) }}" class="img-circle" alt="Avatar"> 
                                <span>{{ auth()->user()->name }}</span> 
                                <i class="icon-submenu lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @if (!Route::currentRouteNamed('create.rpp', 'edit.rpp'))
                            <li>
                                <a data-toggle="modal" data-target="#exampleModal" wire:click.prevent="editProfile"><i class="lnr lnr-user"></i> 
                                    <span>My Profile</span>
                                </a>
                            </li>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li>
                                    <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="lnr lnr-exit"><span>Logout</span></i>
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </li>
                    <!-- <li>
                        <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    
    @include('livewire.component.profile')
</div>



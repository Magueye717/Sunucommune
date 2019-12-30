<!-- ===== Top-Navigation ===== -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="{{ url('/') }}">
                <span>
                    <span class="my-logo-title"> <b>SUNUCOMMUNE</b> </span>
                    {{--<img src="../plugins/images/logo-text.png" alt="homepage" class="dark-logo" />--}}
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i
                            class="icon-arrow-left-circle"></i></a>
            </li>
            {{--<li>
                <form role="search" class="app-search hidden-xs">
                    <i class="icon-magnifier"></i>
                    <input type="text" placeholder="Recherche..." class="form-control">
                </form>
            </li>--}}
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0);">
                    <img src="{{ isset(Auth::user()->avatar) ? asset('storage/images/users/' . Auth::user()->avatar) : asset('themev1/images/default.png') }}"
                         alt="user-img" width="36" class="img-circle">
                    <b class="hidden-xs">{{ Auth::user()->prenom }}</b><span class="caret"></span>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <li><a href="{{ route('mon.profil') }}"><i class="ti-user"></i> Mon Profil</a></li>
                    <li><a href="{{ route('reset.password') }}"><i class="ti-key"></i> Changer de mot de passe</a></li>
                    <li role="separator" class="divider"></li>
                    @section('partie_administrative')
                        <li><a href="{{ route('admin.dashboard') }}"><i class="ti-settings"></i> Administration</a></li>
                    @show
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- ===== Top-Navigation-End ===== -->
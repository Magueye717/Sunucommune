@php
@endphp
<!-- ===== Left-Sidebar ===== -->
<aside class="sidebar" role="navigation">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <img src="{{ isset(Auth::user()->avatar) ? asset('storage/images/users/' . Auth::user()->avatar) : asset('themev1/images/default.png') }}"
                         alt="user-img" class="img-circle">
                </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> {{ Auth::user()->identite }} </a>
                </p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li>
                    <a href="{{ route('gestion.dashboard') }}" aria-expanded="false"
                       class="{{ areActiveRoutes(['gestion.dashboard', 'accueil', 'home'], 'active') }}">
                        <i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Tableau de bord </span>
                    </a>
                </li>
                <!-- Suivi construction -->
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false">
                        <i class="fa fa-building-o fa-fw"></i> <span class="hide-menu"> Suivi des constructions </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Liste des constructions</a></li>
                        <li><a href="#">Carte Map</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- ===== Left-Sidebar-End ===== -->

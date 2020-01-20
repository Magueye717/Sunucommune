@php
    $userRoutes = array('users.index', 'users.create', 'users.edit', 'users.show');
    $roleRoutes = array('roles.index', 'roles.create', 'roles.edit');
    $permRoutes = array('permissions.index', 'permissions.edit');
    $securiteRoutes = array_merge($roleRoutes, $permRoutes);
    $communeRoutes = array('communes.index', 'communes.create', 'communes.edit', 'communes.show');
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
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> {{ Auth::user()->identite }} </a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" aria-expanded="false"
                       class="{{ areActiveRoutes(['admin.dashboard', 'accueil'], 'active') }}">
                        <i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Tableau de bord </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" aria-expanded="false"
                       class="{{ areActiveRoutes($userRoutes, 'active') }}">
                        <i class="icon-user fa-fw"></i> <span class="hide-menu"> Gestion des utilisateurs </span>
                    </a>
                </li>
                <li class="{{ areActiveRoutes($securiteRoutes, 'active') }}">
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false">
                        <i class="icon-lock fa-fw"></i> <span class="hide-menu"> Gestion de la sécurité </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('roles.index') }}" class="{{ areActiveRoutes($roleRoutes, 'active') }}">Gestion
                                des rôles</a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.index') }}"
                               class="{{ areActiveRoutes($permRoutes, 'active') }}">Gestion des permissions</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="" aria-expanded="false"
                       class="{{ areActiveRoutes($communeRoutes, 'active') }}">
                        <i class="fa fa-building-o fa-fw"></i> <span class="hide-menu"> Gestion des communes </span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false">
                        <i class="icon-settings fa-fw"></i> <span class="hide-menu"> Paramétrage</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Type de bénéficiaires</a></li>
                        <li><a href="#">Type de constructions</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- ===== Left-Sidebar-End ===== -->
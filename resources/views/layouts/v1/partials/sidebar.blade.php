@php
    $infoRoutes = array('infos.index', 'infos.create', 'infos.edit', 'infos.show');
    $membreRoutes = array('membre-cabinets.index', 'membre-cabinets.create', 'membre-cabinets.edit', 'membre-cabinets.show');
    $partenaireRoutes = array('partenaires.index', 'partenaires.create', 'partenaires.edit');
    $articleRoutes = array('articles.index', 'articles.create', 'articles.edit', 'articles.show');
    $communeRoutes = array_merge($infoRoutes, $membreRoutes, $partenaireRoutes, $articleRoutes);
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
                <li class="{{ areActiveRoutes($communeRoutes, 'active') }}">
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false">
                        <i class="fa fa-building-o fa-fw"></i> <span class="hide-menu">Gestion de la commune</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li>
                            <a href="{{ route('infos.index') }}" class="{{ areActiveRoutes($infoRoutes, 'active') }}">
                                Infos de ma commune</a>
                        </li>
                        <li>
                            <a href="{{ route('membre-cabinets.index') }}"
                               class="{{ areActiveRoutes($membreRoutes, 'active') }}">Membre du cabinet</a>
                        </li>
                        <li>
                            <a href="{{ route('partenaires.index') }}"
                               class="{{ areActiveRoutes($partenaireRoutes, 'active') }}">Partenaires</a>
                        </li>
                        <li>
                            <a href="{{ route('articles.index') }}"
                               class="{{ areActiveRoutes($articleRoutes, 'active') }}">Articles</a>
                        </li>
                        <li><a href="{{ route('mediatheques.index') }}">Médiathéque</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false">
                        <i class="fa fa-legal fa-fw"></i> <span class="hide-menu">Participation</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('cadres.index') }}">Cadres de concertation</a></li>
                        <li><a href="{{ route('panels.index') }}">Panels</a></li>
                        <li><a href="{{ route('sondages.index') }}">Sondages</a></li>
                        <li><a href="{{ route('thematiques.index') }}">Thematiques</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- ===== Left-Sidebar-End ===== -->

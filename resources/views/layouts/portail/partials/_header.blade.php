<div class="top-bar d-none d-xl-block">
    <div class="container">

        <div class="row">
            <div class="col offset-2">
                <div class="top-bar__inner row justify-content-between align-items-center">
                    <ul class="top-bar__list list-unstyled col">
                        <li class="top-bar__item"><i class="fas fa-map pr-2"></i><a class="top-bar__link"
                                                                                    href="" style="color: white;">Plan de la commune</a></li>
                        <li class="top-bar__item"><i class="fas fa-map-marker-alt pr-2"></i>Voir les autres
                            communes</li>
                        <li class="top-bar__item"><i class="fas fa-envelope pr-2"></i>sunucommune.sn</li>
                        <li class="top-bar__item"><i class="fas fa-user pr-2"></i>Se connecter</li>
                    </ul><a class="btn  btn-sm col-auto" style="background-color: #0B7CD5;"> </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-nav">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="navigation">

                    <nav class="navbar navbar-expand-lg navbar-light ">

                        <a class="navbar-brand"  href="index.html"><img style="height:40%; width:40%;" src="assets/images/logo.png"
                                                                       alt=""></a> <!-- logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button> <!-- navbar toggler -->

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('portail.index') }}">ACCEUIL </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('procedure.index')}}">SERVICES PUBLICS </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">GESTION DES INFRASTRUCTURES </a>

                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('participation.index') }}">PARTICIPATION CITOYENNE </a>

                                </li>



                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                </div> <!-- navigation -->
            </div>
        </div> <!-- row -->
    </div>
</div>

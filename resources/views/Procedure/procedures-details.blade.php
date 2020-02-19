<div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-2 col-xs-12 "></div>
                <div class="col-lg-4 col-md-10 col-xs-12 center mt-30">
                    <div class="about_item_tb">
                        <div class="about_item_tbcell text-center">
                            <h3>Les demarches les plus courantes
                            <p>We have been in the repair and service business since 1984. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-9 ">
                    <div class="services-item text-center mt-30 wow fadeIn hoverable card-service"  data-wow-duration="1500ms" data-wow-delay="0ms">
                        <h3 class="title">Etat civil</h3>
                        <img class="mt-30 mb-30" src="assets/images/icon-famille.svg" width="25%" height="25%"  alt="">
                        <ul class="text-center">
                            @php $procedure = 0; @endphp
                            @foreach ($etats->sortByDesc('created_at')->slice(0, 3) as $etat)
                            @if($etat->statut === 1  )
                            @php $procedure ++;@endphp
                                <li>
                                    <a href=""></i>  {{ $etat->titre }}</a>
                                </li>
                            @endif
                            @endforeach


                            @if($procedure == 0)
                                <li>
                                    il n'existe pas de procedure pour cette categorie.
                                </li>
                            @endif
                        </ul>
                        @if($procedure >= 3)
                        <div class="container">
                        <button type="button" class="btn btn-outline-primary btn-sm btn-block mt-50">Voir plus</button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30 wow fadeIn hoverable  card-service"  data-wow-duration="1500ms" data-wow-delay="400ms">
                        <h3 class="title">Foncier</h3>
                        <img class="mt-30 mb-30" src="assets/images/icon-foncier.svg" width="15%" height="17%"  alt="">
                        <ul class="text-center">
                            @php $procedure = 0; @endphp
                            @foreach ($fonciers->sortByDesc('created_at')->slice(0, 3) as $foncier)
                            @if($foncier->statut === 1  )
                            @php $procedure ++;@endphp
                                <li>
                                    <a href=""></i>  {{ $foncier->titre }}</a>
                                </li>
                            @endif
                            @endforeach

                            @if($procedure == 0)
                                <li>
                                    il n'existe pas de procedure pour cette categorie.
                                </li>
                            @endif
                        </ul>
                        @if($procedure >= 3)
                        <div class="container">
                        <button type="button" class="btn btn-outline-primary btn-sm btn-block mt-50">Voir plus</button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30 wow fadeIn hoverable card-service"  data-wow-duration="1500ms" data-wow-delay="800ms">
                        <h3 class="title">Fiscalite</h3>
                        <img class="mt-30 mb-30" src="assets/images/icon-fiscalite.svg" width="20%" height="20%"  alt="">
                        <ul class="text-center">
                            @php $procedure = 0; @endphp
                            @foreach ($fiscalites->sortByDesc('created_at')->slice(0, 3) as $fiscalite)
                            @if($fiscalite->statut === 1  )
                            @php $procedure ++;@endphp

                                <li>
                                    <a href=""></i>  {{ $fiscalite->titre }}</a>
                                </li>
                            @endif
                            @endforeach

                            @if($procedure == 0)
                                <li>
                                    il n'existe pas de procedure pour cette categorie.
                                </li>
                            @endif
                        </ul>
                        @if($procedure >= 3)
                        <div class="container">
                        <button type="button" class="btn btn-outline-primary btn-sm btn-block mt-50">Voir plus</button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-9">
                    <div class="services-item text-center mt-30 wow fadeIn hoverable card-service"  data-wow-duration="1500ms" data-wow-delay="800ms">
                        <h3 class="title">Social</h3>
                        <img class="mt-30 mb-30" src="assets/images/icon-social.svg " width="20%" height="20%"  alt="">
                        <ul class="text-center">
                            @php $procedure = 0; @endphp
                            @foreach ($socials->sortByDesc('created_at')->slice(0, 3) as $social)
                            @if($social->statut === 1  )
                            @php $procedure ++;@endphp

                                <li>
                                    <a href=""></i>  {{ $social->titre }}</a>
                                </li>
                            @endif
                            @endforeach

                            @if($procedure == 0)
                                <li>
                                    il n'existe pas de procedure pour cette categorie.
                                </li>
                            @endif
                        </ul>
                        @if($procedure >= 3)
                        <div class="container">
                        <button type="button" class="btn btn-outline-primary btn-sm btn-block mt-50">Voir plus</button>
                        </div>
                        @endif
                        </div>

                </div>
            </div>
        </div>

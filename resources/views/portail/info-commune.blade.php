@extends('layouts.portail.portail')
@section('content')

<section class="we-provide mt-90 mb-40 rmb-90">
    <div class="container">
    <div class="we-provide-inner">
    <div class="row align-items-center">
    <div class="col-lg-4">
    <div class="we-provide-img pl-15">
        <img width="80%" src="{{ isset($communeInfo->photo_maire) ? asset('storage/commune/photos/' . $communeInfo->photo_maire) : asset('themev1/images/default.png') }}"
        alt="avatar" class="img-thumbnail">
    </div>
    </div>
    <div class="col-lg-8 case-details-area">
        <div class="we-provide-content">
            <div class="section-title">
                <h2>Mot du maire</h2>
                <span class="line"></span>
            </div>
            <p>{!! $communeInfo->mot_du_maire !!}</p>
        </div>
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="case-share d-block d-md-flex justify-content-between align-items-center ">
                    <div class="case-tag">
                    </div>
                    <div class="case-social " style="padding:10px 20px;">
                        <ul>
                            <li><span>Share Project</span></li>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
<!--====== CASE DETAILS PART START ======-->

<section class="case-details-area pb-130" style="background-color:white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="case-list d-block d-sm-flex justify-content-between">
                    <div class="item mt-35">
                        <span>Commune</span>
                        <h3 class="title">{{ $communeInfo->collectivite->nom }}</h3>
                    </div>
                    <div class="item mt-35">
                        <span>Date de création</span>
                        <h3 class="title">{{ $communeInfo->date_creation }}</h3>
                    </div>
                    <div class="item mt-35">
                        <span>Superficie de la commune</span>
                        <h3 class="title">{{ $communeInfo->superficie }}
                            <strong class="tx-inverse tx-medium"> m² </strong>
                        </h3>
                    </div>
                    <div class="item mt-35">
                        <span>Population</span>
                        <h3 class="title">{{ $communeInfo->population }}
                            <strong class="tx-inverse tx-medium"> hbts </strong>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="case-content mt-30">
                    <h3 class="title">Historique de la commune</h3>
                    <span class="line"></span>
                    <p>La commune de {!! $communeInfo->collectivite->nom !!} est créé le {{ $communeInfo->date_creation }} et compte {{ $communeInfo->population }} habitants avec une superficie de {{ $communeInfo->superficie }} mètres carrés .</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="case-content  pl-70">
                    @php $historiques= $communeInfo->historique;  @endphp
                    @if(empty($historiques))
                    <div class="mx-auto text-center">
                        <h4  style="color:#12BDE3;">Il n'existe pas d'historique pour cette commune</h4>
                        <img src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
                    </div>
                    @else
                    <p class="text">{!! $communeInfo->historique !!}</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

<!--====== CASE DETAILS PART ENDS ======-->

<!--====== TEAM 2 PART START ======-->

<section class="team-2-area about-team">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-5">
                    <div class="section-title mt-45" style="text-align:center;">
                        <h2 class="title text-center-imp" >Présentation <br> <span><span>Les anciens maires</span></span></h2>
                        <p>Something knows About Team</p>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
            @if($ancienMaires->count() === 0)
            {{-- @if(empty($ancienMaires)) --}}
                    <div class="mx-auto text-center">
                        <h4  style="color:#12BDE3;">Aucun ancien maire</h4>
                        <img src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
                    </div>
                @else
                    @foreach ($ancienMaires->sortByDesc('date_fin_mandat')->slice(0, 4) as $ancienMaire)
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="team-item mt-40 wow fadeIn" data-wow-duration="1500ms" data-wow-delay="0ms">
                            <div class="team-thumb">
                                <img src="{{ isset($ancienMaire->photo) ? asset('storage/commune/photos/' . $ancienMaire->photo) : asset('themev1/images/default.png') }}" alt="ss" style="height: 250px; width:250px;">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-content text-center">
                                <h3 class="title">{{ $ancienMaire->prenom }} {{ $ancienMaire->nom }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                    {{-- @php dd($ancienMaires); @endphp --}}
                    @if($ancienMaires->count() > 4)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-btn text-center mt-55">
                                <a class="main-btn" href="team.html">View All Member</a>
                            </div>
                        </div>
                    </div>
                    @endif

{{--
                    @if($ancienMaires->count() <= 0)
                        <div class="text-center mt-200">
                            <h4 style="color:#12BDE3;">Aucune Publication</h4>
                            <img  src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
                        </div>
                    @endif --}}
            @endif
        </div>
</section>

    <!--====== TEAM 2 PART ENDS ======-->


@endsection

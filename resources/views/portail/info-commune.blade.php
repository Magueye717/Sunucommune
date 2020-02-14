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
                    <p class="text">{!! $communeInfo->historique !!}</p>
                    
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
                <div class="col-lg-5">
                    <div class="section-title mt-45">
                        <h2 class="title">Presentation <br> <span><span>Les anciens maires</span></span></h2>
                        <p>Something knows About Team</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title">
                        <p class="text">But we must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="team-item mt-40 wow fadeIn" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="team-thumb">
                            <img src="assets/images/team-2.1.png" alt="team">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content text-center">
                            <h3 class="title">Frank M. Perez</h3>
                            <span>Senior IT Specialist</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="team-item mt-40 wow fadeIn" data-wow-duration="1500ms" data-wow-delay="300ms">
                        <div class="team-thumb">
                            <img src="assets/images/team-2.2.png.jpeg" alt="team">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content text-center">
                            <h3 class="title">Marsha C. Wood</h3>
                            <span>Web Developer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="team-item mt-40 wow fadeIn" data-wow-duration="1500ms" data-wow-delay="600ms">
                        <div class="team-thumb">
                            <img src="assets/images/team-2.3.png.jpeg" alt="team">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content text-center">
                            <h3 class="title">Kim M. McCabe</h3>
                            <span>Product Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="team-item mt-40 wow fadeIn" data-wow-duration="1500ms" data-wow-delay="900ms">
                        <div class="team-thumb">
                            <img src="assets/images/team-2.4.png" alt="team">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content text-center">
                            <h3 class="title">Dexter H. Wilson</h3>
                            <span>CEO & Founder</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-btn text-center mt-55">
                        <a class="main-btn" href="team.html">View All Member</a>
                    </div>
                </div>
            </div>
        </div>
</section>

    <!--====== TEAM 2 PART ENDS ======-->


@endsection

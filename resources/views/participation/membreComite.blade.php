@extends('layouts.portail.portail')
@section('content')


<!--====== TEAM 2 PART START ======-->

<section class="team-2-area achievement-area">
    <div class="container">
        <div class="row ">

            <div class="col-lg-5">
                <div class="row ">
                    <div class="col-lg-10 col-md-6 col-sm-6 ">
                        <div class="achievement-counter text-center mt-30">
                            <i class="fal fa-users"></i><br>
                            <span class="counter">58</span>
                            <h5 class="title">membres</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title mt-45">
                    <h2 class="title"><span>Cadre de  <span> concertation </span></span> <br>{{ $comites->nom }}  </h2>
                    <p>Something knows About Team</p>
                    <a class="main-btn" href="team.html">Integrer</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== TEAM 2 PART ENDS ======-->

<!--====== TEAM 2 PART START ======-->

<section class="team-2-area about-team ">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($membres as $membre)
            @if($membre->cadre_de_concertation_id==$comites->id)
            <div class="col-lg-3 col-md-6 col-sm-8">
                <div class="team-item mt-40">
                    <div class="team-thumb">
                        <img src="{{ isset($membre->photo) ? asset('storage/participation/comites/' .$membre->photo) : asset('themev1/images/default.png')}}"
                        alt="photo" height="230px">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-content text-center">
                        <h3 class="title">{{ $membre->prenom.' '.$membre->nom }}</h3>
                        <span>{{ $membre->fonction }}</span>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>

    </div>
</section>

<!--====== TEAM 2 PART ENDS ======-->

@endsection

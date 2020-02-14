@extends('layouts.portail.portail')
@section('content')

<section class="team-page text-center mt-120 rmt-90 mb-135 rmb-90">
    <div class="container">
        <div class="row">    
            <div class="col-md-4 col-xs-12 "></div>
            <div class="col-md-8 col-xs-12 center mb-30">
                <div class="about_item_tb">
                    <div class="about_item_tbcell text-center">
                    <h3>{{$libelle}}</h3>
                        <p>We have been in the repair and service business since 1984. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        @foreach($teamDetails as $CabinetMaire)
            
                <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="our-team-box" style="min-height: 350px;"> 
                <div class="team-img">
                    <img src="{{ isset($CabinetMaire->photo) ? asset('storage/commune/membres/'. $CabinetMaire->photo) : asset('themev1/images/default.png') }}" alt="Service Image" class="rounded-circle" style="height: 160px; width:160px; alt="Membre du canbinet">
                </div>
                <h3>{{ $CabinetMaire->prenom }} {{ $CabinetMaire->nom}}</h3>
                <span>{{ $CabinetMaire->fonction}}</span>
                <p>Adresse: {{ $CabinetMaire->adresse}}</p>
                <p>Tel: {{  $CabinetMaire->telephone }}</p>
                <div class="social-style-one">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                </div>
                </div>
      
        @endforeach
        </div>
    </div>
</section>


@endsection
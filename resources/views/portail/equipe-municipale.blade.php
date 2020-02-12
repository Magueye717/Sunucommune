
<section class="our-team text-center   mt-50">
    <div class="container-xl projet">
        <div class="row">
            <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                <div class="section-title text-center">
                    <h7 style="font-size: 25px; "> <span>Cabinet du <span>Maire</span></span></h7>
                    <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>

                    <p style="font-size: 14px;">
                            @foreach ($equipeMunicipales->where('libelle', 'Cabinet du maire') as $equipe)
                                {{ $equipe->description }}
                            @endforeach
                    </p>
                </div>
            </div>
            <div class="col-xl-9 col-lg-7 col-md-8">
                <div class="our-team-inner three-item-carousel mb-0 ">
                @foreach($membreCabinets as $membreCabinet)
                @if($membreCabinet->equipeMunicipale->libelle==='Cabinet du maire')
                    <div class="our-team-box" style="min-height: 300px; max-height: 300px;">
                        <div class="team-img">
                        <img src="{{ !empty($membreCabinet->photo) ? asset('storage/commune/membres/'. $membreCabinet->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle img-thumbnail table-photo" style="height: 150px; width:150px;">
                        </div>
                        <div style="min-height:50px;">
                            <h4>{{ $membreCabinet->prenom }} {{ $membreCabinet->nom }}</h4>
                        </div>
                        <span>{{ $membreCabinet->fonction }}</span>
                        <p>{{ $membreCabinet->adresse }}</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-team text-center   mt-50">
<div class="container-xl projet">
    <div class="row">
        <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
            <div class="section-title text-center">
                <h7 style="font-size: 25px; "> <span>Secretariat <span>Municipale</span></span></h7>
                <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>

                <p style="font-size: 14px;">
                    @foreach ($equipeMunicipales->where('libelle', 'Secretariat municipale') as $equipe)
                    {{ $equipe->description }}
                    @endforeach
                </p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-8">
            <div class="our-team-inner three-item-carousel mb-0 ">

                @foreach($membreCabinets as $membreCabinet)
            @if($membreCabinet->equipeMunicipale->libelle==='Secretariat municipale')
                <div class="our-team-box" style="min-height: 300px; max-height: 300px;">
                    <div class="team-img">
                    <img src="{{ !empty($membreCabinet->photo) ? asset('storage/commune/membres/'. $membreCabinet->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle img-thumbnail table-photo"  style="height: 150px; width:150px;">
                    </div>
                    <div style="min-height:50px;">
                        <h4>{{ $membreCabinet->prenom }} {{ $membreCabinet->nom }}</h4>
                    </div>
                    <span>{{ $membreCabinet->fonction }}</span>
                    <p>{{ $membreCabinet->adresse }}</p>
                    <div class="social-style-one">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
</section>
<section class="our-team text-center   mt-50">
<div class="container-xl projet">
    <div class="row">
        <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
            <div class="section-title text-center">
                <h7 style="font-size: 25px; "> <span>Conseil <span>Municipale</span></span></h7>
                <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>

                <p style="font-size: 14px;">
                    @foreach ($equipeMunicipales->where('libelle', 'Conseil Municipal') as $equipe)
                    {{ $equipe->description }}
                    @endforeach
                </p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-8">
            <div class="our-team-inner three-item-carousel mb-0 ">
                @foreach($membreCabinets as $membreCabinet)
            @if($membreCabinet->equipeMunicipale->libelle==='Conseil Municipal')
                <div class="our-team-box" style="min-height: 300px; max-height: 300px;">
                    <div class="team-img">
                    <img src="{{ !empty($membreCabinet->photo) ? asset('storage/commune/membres/'. $membreCabinet->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle" style="height: 150px; width:150px;">
                    </div>
                    <div style="min-height:50px;">
                        <h4>{{ $membreCabinet->prenom }} {{ $membreCabinet->nom }}</h4>
                    </div>
                    <span>{{ $membreCabinet->fonction }}</span>
                    <p>{{ $membreCabinet->adresse }}</p>
                    <div class="social-style-one">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>

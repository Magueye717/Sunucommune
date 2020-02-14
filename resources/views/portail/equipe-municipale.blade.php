
<section class="our-team text-center   mt-50">
    <div class="container-xl projet">
        <div class="row">
            <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                <div class="section-title text-center">
                    <h7 style="font-size: 25px; "> <span>Cabinet du <span>Maire</span></span></h7>
                    <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>

                    <p style="font-size: 14px;">
                            @foreach ($equipeMunicipales->where('libelle', 'Cabinet du maire') as $cabinet)
                                {{ $cabinet->description }}
                            @endforeach
                    </p>
                </div>
            </div>
            <div class="col-xl-9 col-lg-7 col-md-8">
                <div class="our-team-inner three-item-carousel mb-0 ">
                @foreach($cabinetMaires as $cabinetMaire)
                @if($cabinetMaire)
                    <div class="our-team-box mb-20" style="min-height: 300px; max-height: 300px; margin-bottom:20px ">
                        <div class="team-img">

                        <img src="{{ isset($cabinetMaire->photo) ? asset('storage/commune/membres/'. $cabinetMaire->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle" style="height: 150px; width:150px;">

                        </div>
                        <div style="min-height:50px;">
                            <h4>{{ $cabinetMaire->prenom }} {{ $cabinetMaire->nom }}</h4>
                        </div>
                        <span>{{ $cabinetMaire->fonction }}</span>
                        <p>{{ $cabinetMaire->adresse }}</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @if($cabinetMaires->count() <= 0)
                        <div>
                            <h4 class="text-warning">Aucun membre pour le cabinet du maire</h4>
                            <img src="{{ asset('assets/images/noData/noData.png') }}" alt="Service Image">
                        </div>
                     @endif
                </div>
            </div>
        </div>
        @if($cabinetMaires->count() > 3)
        <div class=" text-right w-100 ">
            <a href="{{ route('portail.cabinet', $cabinet) }}"  class="hoverable btn-sm br-30 " style=" margin-bottom: 25px; background-color:#12BDE3; color:white;">TOUT VOIR
                <i class="fal fa-arrow-alt-right ml-15"> </i>
            </a>
        </div>
        @endif
    </div>
</section>

<section class="our-team text-center mt-0">
<div class="container-xl projet">
    <div class="row">
        <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
            <div class="section-title text-center">
                <h7 style="font-size: 25px; "> <span>Secretariat <span>Municipale</span></span></h7>
                <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>

                <p style="font-size: 14px;">
                    @foreach ($equipeMunicipales->where('libelle', 'Secretariat municipal') as $secret)
                    {{ $secret->description }}
                    @endforeach
                </p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-8">
            <div class="our-team-inner three-item-carousel mb-0 ">

            @foreach($secretariats as $secretariat)
            @if($secretariat)
                <div class="our-team-box mb-20" style="min-height: 300px; max-height: 300px; margin-bottom:20px">
                    <div class="team-img">

                    <img src="{{ isset($secretariat->photo) ? asset('storage/commune/membres/'. $secretariat->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle" style="height: 150px; width:150px;">

{{--                     <img src="{{ !empty($membreCabinet->photo) ? asset('storage/commune/membres/'. $membreCabinet->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle img-thumbnail table-photo"  style="height: 150px; width:150px;">
 --}}
                    </div>
                    <div style="min-height:50px;">
                        <h4>{{ $secretariat->prenom }} {{ $secretariat->nom }}</h4>
                    </div>
                    <span>{{ $secretariat->fonction }}</span>
                    <p>{{ $secretariat->adresse }}</p>
                    <div class="social-style-one">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            @endif
            @endforeach 
            
            @if($secretariats->count() <= 0)
            <div>
                <h4 class="text-warning">Aucun membre pour le sécretariat municipal</h4>
                <img src="{{ asset('assets/images/noData/noData.png') }}" alt="Service Image">
            </div>
            @endif
            </div>
        </div>
    </div>
    @if($secretariats->count() > 3)
        <div class=" text-right w-100 ">
            <a href="{{ route('portail.cabinet', $cabinet) }}"  class="hoverable btn-sm br-30 " style=" margin-bottom: 25px; background-color:#12BDE3; color:white;">TOUT VOIR
                <i class="fal fa-arrow-alt-right ml-15"> </i>
            </a>
        </div>
    @endif
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
                    @foreach ($equipeMunicipales->where('libelle', 'Conseil municipal') as $conseilMunicipal)
                    {{ $conseilMunicipal->description }}
                    @endforeach
                </p>
            </div>
        </div>
        <div class="col-xl-9 col-lg-7 col-md-8">
            <div class="our-team-inner three-item-carousel mb-0 ">
                @foreach($conseils as $conseil)
            @if($conseil)
                <div class="our-team-box mb-20" style="min-height: 300px; max-height: 300px; margin-bottom:20px">
                    <div class="team-img">

                    <img src="{{ isset($conseil->photo) ? asset('storage/commune/membres/'. $conseil->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle" style="height: 150px; width:150px;">

{{--                     <img src="{{ !empty($membreCabinet->photo) ? asset('storage/commune/membres/'. $membreCabinet->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="Membre du canbinet" class="rounded-circle" style="height: 150px; width:150px;">
 --}}
                    </div>
                    <div style="min-height:50px;">
                        <h4>{{ $conseil->prenom }} {{ $conseil->nom }}</h4>
                    </div>
                    <span>{{ $conseil->fonction }}</span>
                    <p>{{ $conseil->adresse }}</p>
                    <div class="social-style-one">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                @endif
                @endforeach
                @if($conseils->count() <= 0)
                    <div>
                        <h4 class="text-warning">Aucun membre pour le conseil municipal</h4>
                        <img src="{{ asset('assets/images/noData/noData.png') }}" alt="Service Image">
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if($conseils->count() > 3)
    <div class=" text-right w-100 ">
        <a href="{{ route('portail.cabinet', $cabinet) }}"  class="hoverable btn-sm br-30 " style=" margin-bottom: 25px; background-color:#12BDE3; color:white;">TOUT VOIR
            <i class="fal fa-arrow-alt-right ml-15"> </i>
        </a>
    </div>
    @endif
</div>
</section>

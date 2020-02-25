<section class="our-service mb-150 rmb-100">
    <div class="container-xl">
        <div class="section-title text-center pt-40" style="margin-top: 10px;">
            <h1 class="title"> <span>Equipes <span>Municipales</span></span></h1>
            <ul class="divider"><img src="assets/images/Sep.png" alt=" "></ul>
        </div>
        @php $type_equipe=''; @endphp
        @foreach($equipes as $key => $equipe)
            <div class="row">
                @if(($type_equipe != $equipe->equipe_id ))
                    <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                        <div class="section-title text-center">
                            <h7 style="font-size: 25px; "><span>{{$equipe->libelle}}</span></h7>
                            <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
                            <p style="font-size: 14px;">
                                {{ $equipe->description }}
                            </p>
                        </div>
                    </div>
                @else
                @endif
                <div style="" class="col-md-9">
                    <div class="our-service-inner three-item-carousel">

                        @foreach($equipes as $key => $equipee)

                            @if(($type_equipe != $equipe->equipe_id ) && ($equipe->equipe_id ==$equipee->equipe_id ))

                                <div class="our-team-box mb-20 text-center"
                                     style="min-height: 300px; max-height: 300px; margin-bottom:20px ">
                                    <div class="team-img">

                                        <img
                                            src="{{ isset($equipee->photo) ? asset('storage/commune/membres/'. $equipee->photo) : asset('themev1/images/default.png') }}"
                                            alt="Service Image" alt="{{$equipee->libelle}}" class="rounded-circle"
                                            style="height: 150px; width:150px;">

                                    </div>
                                    <div style="min-height:50px;">
                                        <h4>{{ $equipee->prenom }} {{ $equipee->nom }}</h4>
                                    </div>
                                    <span>{{ $equipee->fonction }}</span>
                                    <p>{{ $equipee->adresse }}</p>

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
            @php $type_equipe=$equipe->equipe_id; @endphp
        @endforeach

    </div>
</section>


@php $type_equipe=''; @endphp
@foreach($equipes as $key => $equipe)

            @if($type_equipe!=$equipe->equipe_id && $type_equipe!='')
            <section class="our-team text-center   mt-50">
                <div class="container-xl projet">
                    <div class="row">
                    <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                         <div class="section-title text-center">
                             <h7 style="font-size: 25px; "> <span>{{$equipe->libelle}}</span></h7>
                             <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
                                <p style="font-size: 14px;">
                                  
                                            {{ $equipe->description }}
                                       
                                </p>
                         </div>
                    </div>
                    @else
                    @endif
                
            <div class="col-xl-9 col-lg-7 col-md-8">
                <div class="our-team-inner three-item-carousel mb-0 ">
                    <div class="our-team-box mb-20" style="min-height: 300px; max-height: 300px; margin-bottom:20px ">
                        <div class="team-img">

                        <img src="{{ isset($equipe->photo) ? asset('storage/commune/membres/'. $equipe->photo) : asset('themev1/images/default.png') }}" alt="Service Image" alt="{{$equipe->libelle}}" class="rounded-circle" style="height: 150px; width:150px;">

                        </div>
                        <div style="min-height:50px;">
                            <h4>{{ $equipe->prenom }} {{ $equipe->nom }}</h4>
                        </div>
                        <span>{{ $equipe->fonction }}</span>
                        <p>{{ $equipe->adresse }}</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                   
                </div>
            </div>

            @if($type_equipe!=$equipe->equipe_id && $type_equipe!='')
          
        </div>
       
    </div>
</section>
            @endif
    
@php $type_equipe=$equipe->equipe_id; @endphp
@endforeach

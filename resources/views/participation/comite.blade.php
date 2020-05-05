@extends('layouts.portail.portail')
@section('content')


 <!--====== PROJECT PART START ======-->

 <section class="project-case-area pt-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title text-center pt-40" >
                <h1 class="title"> <span>Comité <span>Consultatif</span></span></h1>
                <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
            </div>
        </div>
        <div class="row justify-content-center mb-50">
            @foreach ($comites as $comite)
            @if ($comite->statut==1)
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="project-case-item mt-30">
                    <div class="project-case-thumb">
                        {{--  <img src="assets/images/cadre1.jpeg" alt="">  --}}
                        <img src="{{ isset($comite->photo) ? asset('storage/participation/comites/' .$comite->photo) : asset('assets/images/cadre1.jpeg')}}" height="290px;" alt="Blog Details Image">
                        <i class="fal fa-stars"></i>
                    </div>
                    <div class="project-case-content text-center pt-20">
                    <h4 class="title">{{$comite->nom}}</h4>
                        {{-- <span>{{$comite->collectivite->nom}}</span> --}}
                        <br>
                        <a href="{{ route('participation.membre',$comite->id) }}">Details <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>


<!--====== PROJECT PART START ======-->

@endsection


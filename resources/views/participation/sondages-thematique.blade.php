@extends('layouts.portail.portail')
@section('content')



 <!--====== CASE STUDY PART START ======-->

 <section class="case-study-area pb-130 case-page-1">
    <div class="container">
        <div class="section-title text-center pt-40" style="margin-top: 10px;">
            <h1 class="title"> <span>Thématique <span>{{ $thematique->libelle }}</span></span></h1>
            <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
        </div>
        <div class="row justify-content-center">


            @foreach ($sondages as $panel)
            @if($panel->thematique_id==$thematique->id)
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="case-item mt-30">
                    <div class="case-thumb">
                        <img src="{{ !empty($panel->photo) ? asset('storage/participation/sondage/photos/'. $panel->photo) : asset('themev1/images/default.png') }}" height="280px" alt="Blog Details Image">
                    </div>
                    <div class="case-content white-bg">
                        <h4 class="title">{{$panel->titre}}</h4>
                        <p>{!! $panel->description !!}</p>
                        <a href="{{ route('sondage.details',$panel->id) }}">View Details <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            @endif
            @endforeach
        </div>
    </div>
</section>

<!--====== CASE STUDY PART ENDS ======-->


@endsection


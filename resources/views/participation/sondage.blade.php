@extends('layouts.portail.portail')
@section('content')


 <!--====== CASE STUDY PART START ======-->

 <section class="blog-page case-study-area pb-130 case-page-1">
    <div class="container blog-load">
        <div class="row justify-content-center">
            <div class="section-title text-center pt-10">
                <h1 class="title"> <span>Sondages <span></span></span></h1>
                <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
            </div>
        </div>
        @if($allsondages->count() === 0)
                    <div class="mx-auto mt-40 text-center">
                        <h4 style="color:#12BDE3;">Aucun sondage n'a encore été créer.</h4>
                        <img src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
                    </div>
        @endif
        @php $thematique=''; @endphp
        @foreach ($allsondages as $sondage)
        @if($thematique != $sondage->thematique_id)
        <div class="section-title text-center pt-30">
            <a href="{{ route('sondage.thematiques',$sondage->thematique_id) }}">
            <h4 class="title"> <span><span>{{ $sondage->libelle }}</span></span></h4>
            </a>
            <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
        </div>
        @endif
        <div class="row justify-content-center">
            @php $counter=0; @endphp
            @foreach ($allsondages as $sondages)
            @if($thematique != $sondage->thematique_id && $sondage->thematique_id == $sondages->thematique_id  && $counter<3)
            @php $counter++; @endphp
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="case-item mt-30">
                    <div class="case-thumb">
                        <img src="{{ !empty($sondages->photo) ? asset('storage/participation/sondage/photos/'. $sondages->photo) : asset('themev1/images/default.png') }}" height="280px" alt="Blog Details Image">
                    </div>
                    <div class="case-content white-bg">
                        <h4 class="title">{{$sondages->titre}}</h4>
                        <p>{!! $sondages->description !!}</p>
                        <a href="{{ route('sondage.details',$sondage->id) }}">View Details <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @php
            $thematique = $sondage->thematique_id
        @endphp
        @endforeach
    </div>
</section>

<!--====== CASE STUDY PART ENDS ======-->


@endsection


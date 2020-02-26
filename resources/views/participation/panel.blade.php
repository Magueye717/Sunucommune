@extends('layouts.portail.portail')
@section('content')

<div class="banner-area page-title bg_cover" style="background-image: url(assets/images/baniere.png);">
    @include('participation.baniere')
</div>

 <!--====== CASE STUDY PART START ======-->

 <section class="blog-page case-study-area pb-130 case-page-1">
    <div class="container blog-load">
        @php $thematique=''; @endphp
        @foreach ($allPanels as $panel)
        @if($thematique != $panel->thematique_id)
        <div class="section-title text-center pt-40" style="margin-top: 10px;">
            <a href="{{ route('panel.thematiques',$panel->thematique_id) }}">
            <h1 class="title"> <span><span>{{ $panel->libelle }}</span></span></h1>
            </a>
            <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
        </div>
        @endif
        <div class="row justify-content-center">
            @php $counter=0; @endphp
            @foreach ($allPanels as $panels)
            @if($thematique != $panel->thematique_id && $panel->thematique_id == $panels->thematique_id  && $counter<3)
            @php $counter++; @endphp
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="case-item mt-30">
                    <div class="case-thumb">
                        <img src="{{ !empty($panels->photo) ? asset('storage/participation/panels/'. $panels->photo) : asset('themev1/images/default.png') }}" alt="Blog Details Image">
                    </div>
                    <div class="case-content white-bg">
                        <h4 class="title">{{$panels->question}}</h4>
                        <p>{!! $panels->description !!}</p>
                        <a href="{{ route('panel.details',$panel->id) }}">View Details <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @php
            $thematique = $panel->thematique_id
        @endphp
        @endforeach
    </div>
</section>

<!--====== CASE STUDY PART ENDS ======-->


@endsection


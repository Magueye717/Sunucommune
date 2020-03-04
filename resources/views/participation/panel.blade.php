@extends('layouts.portail.portail')
@section('content')


 <!--====== CASE STUDY PART START ======-->


 <section class="blog-area-2 pt-80 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title text-center pt-40" style="margin-top: 10px;">
                <h1 class="title"> <span>Panel <span>Citoyen</span></span></h1>
                <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
            </div>
        </div>
        @if($allPanels->count() === 0)
                    <div class="mx-auto mt-40 text-center">
                        <h4  style="color:#12BDE3;">Aucun panel n'a encore été créer.</h4>
                        <img src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
                    </div>
        @endif
        @php $thematique=''; @endphp
        <div class="row justify-content-center">
        @foreach ($allPanels as $panel)
            @php $counter=0; @endphp
            @foreach ($allPanels as $panels)
            @if($thematique != $panel->thematique_id && $panel->thematique_id == $panels->thematique_id  && $counter<3)
            @php $counter++; @endphp
            <div class="col-lg-4 col-md-7 col-sm-9 pt-20">
                <div class="blog-item mt-30 wow fadeIn animated" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <img src="{{ !empty($panels->photo) ? asset('storage/participation/panels/'. $panels->photo) : asset('themev1/images/default.png') }}" alt="Blog Details Image">
                    <div class="blog-overlay">
                        <div class="blog-tag">
                            <a href="{{ route('panel.thematiques',$panels->thematique_id) }}">
                            <span>{{ $panels->libelle }}</span>
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li><i class="fal fa-calendar-alt"></i>{{$panels->created_at->formatLocalized('%d %B %Y') }}</li>
                            </ul>
                            <h4 class="title"><a href="#">{{strip_tags(TruncateTexte::truncate($panels->question,50))}}</a></h4>
                            <p>{{ strip_tags(TruncateTexte::truncate($panels->description,250)) }}</p>
                            <br>
                            <a href="{{ route('panel.details',$panels->id) }}">View Details <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        @php
            $thematique = $panel->thematique_id
        @endphp
        @endforeach
    </div>
    </div>
</section>

<!--====== CASE STUDY PART ENDS ======-->

<!--====== BLOG 2 PART START ======-->

{{-- <!--====== CASE STUDY PART START ======-->

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

<!--====== CASE STUDY PART ENDS ======--> --}}

<!--====== BLOG 2 PART ENDS ======-->

@endsection


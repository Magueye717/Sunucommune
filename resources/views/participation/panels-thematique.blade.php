@extends('layouts.portail.portail')
@section('content')



 <!--====== CASE STUDY PART START ======-->

 {{-- <section class="case-study-area pb-130 case-page-1">
    <div class="container">
        <div class="section-title text-center pt-40" style="margin-top: 10px;">
            <h1 class="title"> <span>Thématique <span>{{ $thematique->libelle }}</span></span></h1>
            <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
        </div>
        <div class="row justify-content-center">


            @foreach ($panels as $panel)
            @if($panel->thematique_id==$thematique->id)
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="case-item mt-30">
                    <div class="case-thumb">
                        <img src="{{ !empty($panel->photo) ? asset('storage/participation/panels/'. $panel->photo) : asset('themev1/images/default.png') }}" alt="Blog Details Image">
                    </div>
                    <div class="case-content white-bg">
                        <h4 class="title">{{$panel->question}}</h4>
                        <p>{!! $panel->description !!}</p>
                        <a href="{{ route('panel.details',$panel->id) }}">View Details <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            @endif
            @endforeach
        </div>
    </div>
</section> --}}

<!--====== CASE STUDY PART ENDS ======-->

<!--====== BLOG 2 PART START ======-->

<section class="blog-area-2 pt-80 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title text-center pt-40" style="margin-top: 10px;">
                <h1 class="title"> <span>Thématique <span>{{ $thematique->libelle }}</span></span></h1>
                <ul class="divider"><img src="{{ asset('assets/images/Sep.png') }}" alt=" "></ul>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($panels as $panel)
            @if($panel->thematique_id==$thematique->id)
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="blog-item mt-30 wow fadeIn animated" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <img src="{{ !empty($panel->photo) ? asset('storage/participation/panels/'. $panel->photo) : asset('themev1/images/default.png') }}" alt="Blog Details Image">
                    <div class="blog-overlay">
                        <div class="blog-tag">
                            <span>{{ $thematique->libelle }}</span>
                        </div>
                        <div class="blog-content">
                            <ul>
                                <li><i class="fal fa-calendar-alt"></i>{{$panel->created_at->formatLocalized('%d %B %Y') }}</li>
                            </ul>
                            <h4 class="title"><a href="#">{{$panel->question}}</a></h4>
                            <p>{!! $panel->description !!} </p>
                            <br>
                            <a href="{{ route('panel.details',$panel->id) }}">View Details <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!--====== BLOG 2 PART ENDS ======-->



@endsection


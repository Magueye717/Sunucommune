@extends('layouts.portail.portail')
@section('content')


    <div class="banner-area page-title bg_cover" style="background-image: url({{ asset('assets/images/baniere.png') }});">
    @include('procedure.baniere')
</div>

<!--====== CASE STUDY PART START ======-->

<section class="case-study-area pb-130 case-page-2 mt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 "></div>
            <div class="col-md-8 col-xs-12 center mb-30">
                <div class="about_item_tb">
                    <div class="about_item_tbcell text-center">
                    <h3>{{$nom}}</h3>
                        <p>{{ $categorie->description }} </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($procedureDetails as $procedure)
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="case-item-2 mt-30">
                    <img src="{{ asset('assets/images/procedure1.jpeg') }}"  alt="case">
                    <div class="case-overlay">
                        <div class="case-content">
                            <h4 class="title">{!! $procedure->titre !!}</h4>
                            <a href="#">View Details <i class="fal fa-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--====== CASE STUDY PART ENDS ======-->


@endsection

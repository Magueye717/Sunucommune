@extends('layouts.portail.portail')
@section('content')


    
<div class="banner-area page-title bg_cover" style="background-image: url({{ asset('assets/images/baniere.png') }});">
    @include('procedure.baniere', ['titre'=>$nom])
</div>
<!--====== BLOG STANDARD PART START ======-->
   
<section class="blog-standard-area blog-details-area pt-30 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-standard mt-30">
                    <div class="blog-item">
                        <div class="blog-content white-bg ">
                            <div class="blog-quote ">
                            <h2 class="title">{{ $detailProcedure->titre }}</h2>
                            </div>
                            <span class="line"></span>
                            <p>{!! $detailProcedure->description !!}</p>

                        </div>
                    </div>
                    <div class="blog-sharing pt-40 d-block d-sm-flex justify-content-between">
                        <div class="blog-tag">   
                            <ul>
                                <li><span>Lieu de depot  : </span></li>
                            <li> {{$detailProcedure->lieu_depot}}</li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="blog-story">
                        <h3 class="inner-title">Procedures simulaires</h3>
                        <div class="row">
                            @php $counter=0; @endphp
                            @if(isset($similarProcedure))
                                @foreach($similarProcedure->sortByDesc('created_at') as $similar)
                                    @if(($similar->id != $detailProcedure->id )&& $counter<2)
                                    @php $counter++; @endphp
                                    <div class="col-lg-6">
                                        <a href="{{route('procedure.details',$similar->id)}}">
                                            <div class="blog-story-1 ">
                                            <h6 class="title">{{ strip_tags(TruncateTexte::truncate($similar->titre,35))}}</h6>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="blog-sidebar mt-30">
                    <div class="blog-search">
                        <form action="#">
                            <div class="input-box">
                                <input type="text" placeholder="Search Keywords">
                                <button type="button"><i class="far fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="blog-news white-bg mt-50">
                        <div class="blog-title">
                            <h3 class="title">Autres Procedures</h3>
                        </div>
                        @php $counter=0; @endphp
                            @if(isset($procedures))
                                @foreach($procedures->sortByDesc('created_at') as $procedure)
                                    @if(($procedure->categorie_id != $detailProcedure->categorie_id ) && $counter<3)
                                    @php $counter++; @endphp
                                        <div class="blog-news-item">
                                            <div>
                                                <a href="{{route('procedure.details',$procedure->id)}}"><h5 class="title">{{ $procedure->titre }} </h5></a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                    </div>
                    <div class="blog-list white-bg mt-50">
                        <div class="blog-title">
                            <h3 class="title">Category</h3>
                        </div>
                        <div class="blog-list-item">
                            <ul>
                                @foreach ($allProcedures as $allProcedure)
                                <li><a href="#"><span>{{ $allProcedure->nom }}</span> <span>({{ $allProcedure->nombre }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<!--====== BLOG STANDARD PART ENDS ======-->


@endsection

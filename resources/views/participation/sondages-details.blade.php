@extends('layouts.portail.portail')
@section('content')


<!--====== BLOG STANDARD PART START ======-->

<section class="blog-standard-area blog-details-area pt-100 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-standard mt-30">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="{{ !empty($detailsondage->photo) ? asset('storage/participation/sondage/photos/'. $detailsondage->photo) : asset('themev1/images/default.png') }}" height="350px" width="700px" alt="Blog Details Image">
                        </div>
                        <div class="blog-content white-bg ">
                            <div class="item d-sm-flex justify-content-between">
                                <div class="blog-date">
                                    <ul>
                                        <li><i class="fal fa-user"></i> {{$detailsondage->ajouterPar->prenom.' '.$detailsondage->ajouterPar->nom}}</li>
                                        <li><i class="fal fa-calendar-alt"></i> {{$detailsondage->created_at->formatLocalized('%d %B %Y') }}</li>
                                    </ul>
                                </div>
                                <div class="blog-social">
                                    <ul>
                                        <li> <span>Share Now</span></li>
                                        <li> <a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="title" style="color:dodgerblue">{{$detailsondage->titre}}</h3>
                            <br>
                            <br>
                            <div class="blog-quote ">
                                <h6 class="d-inline mr-30">Votre avis: </h6>
                                <div class="tags d-inline">
                                    @foreach($detailsondage->sondageOptions as $option)
                                    <a href="#" class="btn-xs">{{$option->libelle}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                        <br>
                        <h3 class="inner-title">Description</h3>
                        <p>{!! $detailsondage->description !!}</p>
                        </div>

                    </div>


                    <div class="blog-story">
                        <div class="row">
                            @php $counter=0; @endphp
                            @if(isset($sondages))
                                @foreach($sondages->sortByDesc('created_at') as $sondage)
                                    @if(($sondage->thematique_id === $detailsondage->thematique_id ) && $counter<2)
                                    @php $counter++; @endphp
                                        <div class="col-lg-6">
                                            <div class="blog-story-1">
                                                <h4 class="title">{{ $sondage->titre }}</h4>
                                            </div>
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
                            <h3 class="title">Recent News</h3>
                        </div>
                        @php $counter=0; @endphp
                            @if(isset($sondages))
                                @foreach($sondages->sortByDesc('created_at') as $sondage)
                                    @if(($sondage->thematique_id != $detailsondage->thematique_id ) && $counter<3)
                                    @php $counter++; @endphp
                                        <div class="blog-news-item">
                                            <div>
                                                <a href="{{route('sondage.details',$sondage->id)}}"><h5 class="title">{{ $sondage->titre }} </h5></a>
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
                                <li><a href="#"><span>Business Strategy</span> <span>(20)</span></a></li>
                                <li><a href="#"><span>Investment Planning </span> <span>(05)</span></a></li>
                                <li><a href="#"><span>Financial Investment</span> <span>(03)</span></a></li>
                                <li><a href="#"><span>Banking & Insurance</span> <span>(30)</span></a></li>
                                <li><a href="#"><span>Free Consulting</span> <span>(07)</span></a></li>
                                <li><a href="#"><span>Meet Our Team </span> <span>(09)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== BLOG STANDARD PART ENDS ======-->


<!--====== BLOG STANDARD PART START ======-->

{{--  <section class="blog-standard-area blog-details-area pt-30 pb-130">
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
                        <h3 class="inner-title">sondages simulaires</h3>
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
                            <h3 class="title">Autres sondages</h3>
                        </div>
                        @php $counter=0; @endphp
                            @if(isset($sondages))
                                @foreach($sondages->sortByDesc('created_at') as $procedure)
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
                                @foreach ($allsondages as $allProcedure)
                                <li><a href="#"><span>{{ $allProcedure->nom }}</span> <span>({{ $allProcedure->nombre }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  --}}

<!--====== BLOG STANDARD PART ENDS ======-->


@endsection

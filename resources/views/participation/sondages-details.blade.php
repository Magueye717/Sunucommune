@extends('layouts.portail.portail')
@section('content')



<div class="banner-area page-title bg_cover" style="background-image: url({{ asset('assets/images/baniere.png') }});">
    @include('participation.baniere', ['titre'=>''])
</div>


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
                                        <li><i class="fal fa-user"></i> Daniele Custer</li>
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
                            <h3 class="title ">{{$detailsondage->question}}</h3>

                        </div>
                    </div>
                    <div class="blog-quote ">
                        <p>{!! $detailsondage->description !!}</p>
                    </div>
                    <div class="blog-sharing pt-40 d-block d-sm-flex justify-content-between">
                        <div class="blog-tag">
                            <ul>
                                <li><span>Popular Tag : </span></li>
                                <li><a href="#">IT Services,</a></li>
                                <li><a href="#">Technology,</a></li>
                                <li><a href="#">Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-story">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog-story-1">
                                    <h4 class="title">Building Pub Sub Service Using Node And Redis</h4>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog-story-1 blog-story-2">
                                    <h4 class="title">Once Upon Time Use Story For Better Engagement</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-comments">
                        <div class="blog-title">
                            <h3 class="title">Client’s Comments</h3>
                        </div>
                        <div class="blog-comments-area">
                            <div class="blog-comments-item mt-40">
                                <h6 class="title">Alexzeder Alex <span>25 July 2019</span></h6>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete</p>
                                <span>Reply Commets</span>
                                <img src="assets/images/blog-commtents-1.png" alt="">
                            </div>
                            <div class="blog-comments-item mt-40 ml-60 item-2">
                                <h6 class="title">Alexzeder Alex <span>25 July 2019</span></h6>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete</p>
                                <span>Reply Commets</span>
                                <img src="assets/images/blog-commtents-2.png" alt="">
                            </div>
                            <div class="blog-comments-item mt-40">
                                <h6 class="title">Alexzeder Alex <span>25 July 2019</span></h6>
                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete</p>
                                <span>Reply Commets</span>
                                <img src="assets/images/blog-commtents-3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="blog-massage">
                        <div class="blog-title">
                            <h3 class="title">Send A Message</h3>
                        </div>
                        <div class="blog-form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="Your Full Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="Your Full Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box mt-20">
                                            <textarea name="#" id="#" cols="30" rows="10" placeholder="Write Message"></textarea>
                                            <button class="main-btn" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        <div class="blog-news-item">
                            <div class="item">
                                <a href="#"><h5 class="title">Quick Win For Improe Perfor Securitys. </h5></a>
                                <span>05 Apr 2019</span>
                                <img src="assets/images/blog-news-1.png" alt="">
                            </div>
                        </div>
                        <div class="blog-news-item">
                            <div class="item">
                                <a href="#"><h5 class="title">Quick Win Imperfora Security Web ses </h5></a>
                                <span>05 Apr 2019</span>
                                <img src="assets/images/blog-news-2.png" alt="">
                            </div>
                        </div>
                        <div class="blog-news-item none">
                            <div class="item">
                                <a href="#"><h5 class="title">We’ve Got Announce ment Make Rachel</h5></a>
                                <span>05 Apr 2019</span>
                                <img src="assets/images/blog-news-3.png" alt="">
                            </div>
                        </div>
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
                    <div class="blog-list white-bg mt-50">
                        <div class="blog-title">
                            <h3 class="title">Populer Tag</h3>
                        </div>
                        <div class="blog-tag">
                            <ul>
                                <li><a href="#">Cleaning</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Booking</a></li>
                            </ul>
                            <ul class="mt-10">
                                <li><a href="#">Car</a></li>
                                <li><a href="#">House</a></li>
                                <li><a href="#">Apartment</a></li>
                            </ul>
                            <ul class="mt-10">
                                <li><a href="#">Washing</a></li>
                                <li><a href="#">Agency</a></li>
                                <li><a href="#">Listing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-add-area mt-55">
                        <img src="assets/images/blog-add.jpg" alt="add">
                        <div class="add-overlay">
                            <h3 class="title">Work <br> Together</h3>
                            <p>Bur wemust ipsum dolor sit amet  consectetur adipisicing elit sed eius-mod tempor incididunt ut labore</p>
                            <a class="main-btn main-btn-2" href="#">Contact Now <i class="fal fa-angle-double-right"></i></a>
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
</section>  --}}

<!--====== BLOG STANDARD PART ENDS ======-->


@endsection

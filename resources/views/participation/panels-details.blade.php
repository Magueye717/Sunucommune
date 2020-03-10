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
                            <img src="{{ !empty($detailpanel->photo) ? asset('storage/participation/panels/'. $detailpanel->photo) : asset('themev1/images/default.png') }}" height="350px" width="700px" alt="Blog Details Image">
                        </div>
                        <div class="blog-content white-bg ">
                            <div class="item d-sm-flex justify-content-between">
                                <div class="blog-date">
                                    <ul>
                                        <li><i class="fal fa-user"></i> Daniele Custer</li>
                                        <li><i class="fal fa-calendar-alt"></i> {{$detailpanel->created_at->formatLocalized('%d %B %Y') }}</li>
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
                            <h3 class="title ">{{$detailpanel->question}}</h3>

                        </div>
                    </div>
                    <div class="blog-quote ">
                        <p>{!! $detailpanel->description !!}</p>
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
                        <h3 class="title">Commentaires</h3>
                        </div>
                     @forelse($detailpanel->commentaires as $comment)
                        <div class="blog-comments-area">
                            <div class="blog-comments-item mt-40">
                                <h6 class="title">{{$comment->nom}} <span>{{ \Carbon\Carbon::parse($comment->created_at)->diffForhumans() }}</span></h6>
                            <p>{{$comment->commentaire}}</p>
                            <div class="d-flex justify-content-between">
                                <span>Les réponses</span>
                            <img src="{{asset('themev1/images/default.png')}}" alt="" width=" 100px">
                               <div class="btn btn-outline-primary btn-small repondreCommentaire" onclick="$('#parent_id').val('{{$comment->id}}');">Répondre</div>
                            </div>

                            </div>
                            @foreach ($comment->panelCommentaires as $item)
                            <div class="blog-comments-item mt-40 ml-60 item-2">
                                <h6 class="title">{{ $item->nom }} <span>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</span></h6>
                                <p>{{$item->commentaire}}</p>
                                <span>Réponses</span>
                                <img src="{{asset('themev1/images/default.png')}}" alt="" width=" 70px">
                            </div>
                            @endforeach
                        </div>
                        @empty 
                            <h5 class="pt-5 justify-content-center">Aucun commentaire</h5>
                        @endforelse
                    </div>
                    <div class="blog-massage pt-5" id="commentForm">
                        <div class="blog-title">
                            <h3 class="title">Vos commentaires</h3>
                        </div>
                        <div class="blog-form" >
                        <form action="{{ route('commentaires.store') }}" method="post">
                            @csrf
                            <div class="col-lg-6">
                                <div class="input-box mt-20">
                                    <input type="hidden" name="panel_id" id="panel_id">
                                    <input type="hidden" name="parent_id" id="parent_id">
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="Nom complet" name="nom">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="Votre email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box mt-20">
                                            <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Votre commentaire" name="commentaire"></textarea>
                                            <button class="main-btn" type="submit" onclick="$('#panel_id').val('{{$detailpanel->id}}');">Commenter</button>
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

@endsection
@push('myJS')
<script>
   $(".repondreCommentaire").click(function() {
    $("html, body").animate({ scrollTop: $("#commentForm").offset().top }, 1500);
   });
 </script>
@endpush




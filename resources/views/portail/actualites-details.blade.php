@extends('layouts.portail.portail')
@section('content')

<div class="banner-area page-title bg_cover" style="background-image: url({{ asset('assets/images/baniere.png')}});">
    @include('portail.baniere_actualite')
</div>


<section class="blog-details-page mt-50 rmt-100 mb-135 rmb-95">
    <div class="container">
    <div class="row">
    <div class="col-lg-8">
    <div class="blog-details-content bg-white br-10 mb-50">
    <h3 class="mb-40 text-uppercase">{{$detailActus->titre}}</h3>
    <img src="{{ !empty($detailActus->photo) ? asset('storage/commune/articles/photos/'. $detailActus->photo) : asset('themev1/images/default.png') }}" height="350px" width="700px" alt="Blog Details Image">
    <div class="date-admin mt-15 mb-15">
    <span class="date">{{$detailActus->created_at->formatLocalized('%d %B %Y') }}</span>
    <span class="admin">Par:<a href="#">{{$detailActus->ajouterPar->Identite}}</a></span>
    </div>
    <p>
        {!! $detailActus->texte !!}
    </p>
    {{-- <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.</p>
    <blockquote>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metu libeaugue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. libero dolor a purus.</blockquote>
    <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede,</p>
     --}}
    </div>
    <div class="blog-details-tags mb-50">
    <h6 class="d-inline mr-30">Tags: </h6>
    <div class="tags d-inline">
    <a href="#">Latest News</a>
    <a href="#">Business</a>
    </div>
    </div>
    <div class="related-post mb-30">
    <h3 class="inner-title">Actualités simulaires</h3>
    <div class="row text-center">


        @php $counter=0; @endphp
        @if(isset($silimarActus))
            @foreach($silimarActus->sortByDesc('created_at') as $simular)
                @if(($simular->id != $detailActus->id )&& $counter<2)
                @php $counter++; @endphp
                <div class="col-md-6">
                    <div class="latest-news-box" style="min-height: 480px">
                    <div class="latest-news-img">
                    <img src="{{ !empty($simular->photo) ? asset('storage/commune/articles/photos/'. $simular->photo) : asset('themev1/images/default.png') }}" height="250px" width="400px" alt="Blog Image">
                    </div>
                    <div class="latest-news-content">
                    <h3><a href="{{route('portail.actualites-details', $simular)}}">{{ TruncateTexte::truncate($simular->titre, 30) }}</a></h3>
                    <span class="date">{{$simular->created_at->formatLocalized('%d %B %Y') }}</span>
                    <p>{{strip_tags(TruncateTexte::truncate($simular->texte,200))}}</p>
                    <ul class="blog-statistics">
                    <li><i class="flaticon-share"></i>126</li>
                    <li><i class="flaticon-eye"></i>{{$simular->views}}</li>
                    <li><i class="flaticon-speech-bubbles"></i>20</li>
                    </ul>
                    <div class="news-btn">
                    <a href="{{route('portail.actualites-details', $simular)}}" class="theme-btn">voir plus</a>
                    </div>
                    </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>
    </div>

    </div>
    <div class="col-lg-4">
    <div class="blog-sidebar rmt-50">
    <div class="widget">
    <form class="search">
    <span class="flaticon-magnifying-glass"></span>
    <input class="w-100 br-10" type="search" placeholder="Search">
    </form>
    </div>
    <div class="widget news-widget">
    <h3 class="widget-title">Recent</h3>
    <ul class="list-style-one">
    @if(isset($silimarActus))
     @foreach($silimarActus->sortByDesc('created_at') as $recents)
        @if(($recents->id != $detailActus->id )&& $counter<6)
        @php $counter++; @endphp
        <li><a href="{{route('portail.actualites-details', $recents)}}">{{ TruncateTexte::truncate($recents->titre, 40) }}</a></li>
        @endif
     @endforeach
     @endif
    </ul>
    </div>
    <div class="widget categories-widget">
    <h3 class="widget-title">Categories</h3>
    <ul class="list-style-one">

    @foreach($allArticles as $key => $allArticle)
    <li><a href="#">{{ $allArticle->libelle }} <span>({{ $allArticle->nombre }})</span></a></li>
    @endforeach
    </ul>
    </div>
    <div class="widget tags-widget">
    <h3 class="widget-title">Tags</h3>
    <div class="tags">
     <a href="#">Latest News</a>
    <a href="#">Business</a>
    <a href="#">Empowerment</a>
    <a href="#">Uncategorized</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>


@endsection

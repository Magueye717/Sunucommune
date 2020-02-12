@extends('layouts.portail.portail')
@section('content')

<div class="banner-area page-title bg_cover" style="background-image: url(assets/images/baniere.png);">
    @include('portail.baniere_actualite')
</div>


<section class="blog-page text-center mt-150 rmt-90 mb-120 rmb-70">
<div class="container">
<div class="row blog-load">
    @foreach ($projets->sortByDesc('created_at')->slice(0, 6) as $ActualiteEvenement)
        @if($ActualiteEvenement->typeArticle->libelle==='Actualité'&& $ActualiteEvenement->est_publie===1  )
        <div class="col-xl-4 col-lg-6 col-md-4">
            <div class="latest-news-box">
                <div class="latest-news-img">
                    <img src="{{ !empty($ActualiteEvenement->photo) ? asset('storage/commune/articles/photos/'. $ActualiteEvenement->photo) : asset('themev1/images/default.png') }}" height="200px" alt="Blog Image">
                </div>
                <div class="latest-news-content">
                <h4><a href="">{{strip_tags(TruncateTexte::truncate($ActualiteEvenement->titre,30))}}</a></h4>
                <span class="date">{{$ActualiteEvenement->created_at->formatLocalized('%d %B %Y') }}</span>
                    <p>{{ strip_tags(TruncateTexte::truncate($ActualiteEvenement->texte, 350))  }}</p>
                    <ul class="blog-statistics">
                        <li><i class="fas fa-share"></i>126</li>
                        <li><i class="fas fa-eye"></i>400</li>
                        <li><i class="fas fa-comments"></i>20</li>
                    </ul>
                    <a href="{{route('portail.actualites-details')}}" class="theme-btn">Lire la suite
                    </a>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
</div>
</section>


@endsection

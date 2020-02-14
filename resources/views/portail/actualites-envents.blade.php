<div class="container-fluid">
    <div class="section-title text-center" style="margin-top: 10px;">
        <h1 class="title"> <span>Actualités & <span>Évenements</span></span></h1>

        <ul class="divider"><img src="assets/images/Sep.png" alt=" "></ul>
        <p>Something knows About Our Cases</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="blog-standard">
                <div class="row blog-load ">
                    <section class="blog-page text-center">
                        <div class="container">
                            <div class="row blog-load ">
                                @foreach ($actualites->sortByDesc('created_at')->slice(0, 6) as $ActualiteEvenement)
                                @if($ActualiteEvenement && $ActualiteEvenement->est_publie===1  )
                                <div class="col-xl-4 col-lg-6 col-md-6">
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
                                            <div class="news-btn">
                                                <a href="{{route('portail.actualites-details')}}" class="theme-btn">Lire la suite
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>



                            @if($cabinetMaires->count() >= 6)
                                <div class=" text-right w-100 mt-25 mb-30 !important ">
                                    <a href="{{route('portail.actualite')}}" class="theme-btn br-30 " style=" margin-bottom: 25px; background-color:#12BDE3;">TOUT VOIR
                                        <i class="fal fa-arrow-alt-right ml-15"> </i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
            @if($projets->count() <= 0)
                <div class="text-center mt-200">
                    <h4 style="color:#12BDE3;">Aucune Publication</h4>
                    <img  src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
                </div>
            @endif
        </div>
        <div class="col-lg-3 col-md-10 col-sm-9 br-10">
            <div class="blog-sidebar mt-0">
                <div class="blog-search br-10 ">
                    <form action="/article/search" method="POST">
                        {{ csrf_field() }}
                        <div class="input-box ">
                            <input type="text" placeholder="Search Keywords">
                            <button type="button"><i class="fal fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="blog-news white-bg mt-50 br-10">
                    <div class="blog-title">
                        <h3 class="title">Articles récents</h3>
                    </div>

                    @if(isset($projets))
                    @foreach ($projets->sortByDesc('created_at')->slice(0, 3) as $news)
                    <div class="blog-news-item">
                        <div class="item">
                            <a href="#">
                                <p class="font-weight-bold black"> {{ strip_tags(TruncateTexte::truncate($news->titre,35)) }}</p>
                            </a>
                            <span>{{ $news->created_at->formatLocalized('%d %B %Y') }}</span>
                            <img src="{{ !empty($news->photo) ? asset('storage/commune/articles/photos/'. $news->photo) : asset('themev1/images/default.png') }}" class="rounded-circle" style="width: 60px;" alt="">
                        </div>
                    </div>
                    @endforeach
                    @endif
                    @if($projets->count() >= 6)
                    <div class="text-center">Aucun projets</div>
                    @endif

                </div>
                <div class="blog-list white-bg mt-50 br-10">
                    <div class="blog-title">
                        <h3 class="title">Categories</h3>
                    </div>
                    <div class="blog-list-item">
                        <ul>
                            <li><a href="#"><span>Projets</span> <span>({{ $projets->count() }})</span></a></li>
                            <li><a href="#"><span>Actualités et evenements</span> <span>({{ $actualites->count() }})</span></a></li>
                            <li><a href="#"><span>Délibérations</span> <span>({{ $deliberations->count() }})</span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

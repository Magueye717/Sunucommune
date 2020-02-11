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
                                @foreach ($projets as $ActualiteEvenement)
                                @if($ActualiteEvenement->typeArticle->libelle==='Actualité'&& $ActualiteEvenement->est_publie===1  )
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="latest-news-box">
                                        <div class="latest-news-img">
                                            <img src="{{ isset($ActualiteEvenement->photo) ? asset('storage/commune/articles/photos/'. $ActualiteEvenement->photo) : asset('themev1/images/default.png') }}" alt="Blog Image">
                                        </div>
                                        <div class="latest-news-content">
                                        <h3><a href="blog-details.html">{{$ActualiteEvenement->titre}}</a></h3>
                                        <span class="date">{{$ActualiteEvenement->created_at->formatLocalized('%d %B %Y') }}</span>
                                            <p>{{ strip_tags(TruncateTexte::truncate($ActualiteEvenement->texte, 350))  }}</p>
                                            <ul class="blog-statistics">
                                                <li><i class="fas fa-share"></i>126</li>
                                                <li><i class="fas fa-eye"></i>400</li>
                                                <li><i class="fas fa-comments"></i>20</li>
                                            </ul>
                                            <div class="news-btn">
                                                <a href="blog-details.html" class="theme-btn">Lire la suite</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            
                            <div class=" text-right w-100 mt-25 mb-30 !important ">
                                <a href="{{route('portail.actualite')}}" class="theme-btn br-30 " style=" margin-bottom: 25px; background-color:#12BDE3;">TOUT VOIR
                                    <i class="fal fa-arrow-alt-right ml-15"> </i>
                                </a>
                            </div>
                           
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-9 br-10">
            <div class="blog-sidebar mt-30">
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
                        <h3 class="title">Recent News</h3>
                    </div>
                   
                    @if(isset($projets))
                    @foreach ($projets->sortByDesc('created_at')->slice(0, 3) as $news)
                    <div class="blog-news-item">
                        <div class="item">
                            <a href="#">
                                <h5 class="title">{{ $news->titre }}</h5>
                            </a>
                            <span>05 Apr 2019</span>
                            <img src="{{ isset($news->photo) ? asset('storage/commune/articles/photos/'. $news->photo) : asset('themev1/images/default.png') }}" class="rounded-circle" style="width: 87px;" alt="">
                        </div>
                    </div>
       
                    @endforeach
                    @else
                    <div class="container-fluid">
                        <h3>Aucun article disponible</h3>
                    </div>
                    @endif

                </div>
                <div class="blog-list white-bg mt-50 br-10">
                    <div class="blog-title">
                        <h3 class="title">Category</h3>
                    </div>
                    <div class="blog-list-item">
                        <ul>
                            <li><a href="#"><span>Business Strategy</span> <span>(20)</span></a></li>
                            <li><a href="#"><span>Investment Planning </span> <span>(05)</span></a></li>
                            <li><a href="#"><span>Financial Investment</span> <span>(03)</span></a></li>
                            <li><a href="#"><span>Banking &amp; Insurance</span> <span>(30)</span></a></li>
                            <li><a href="#"><span>Free Consulting</span> <span>(07)</span></a></li>
                            <li><a href="#"><span>Meet Our Team </span> <span>(09)</span></a></li>
                            <li><a href="#"><span>Investment Planning </span> <span>(05)</span></a></li>
                            <li><a href="#"><span>Financial Investment</span> <span>(03)</span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

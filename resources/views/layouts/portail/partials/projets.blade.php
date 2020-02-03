<div class="container">
    <div class="section-title text-center">
        <h1 class="title"> <span>Nos <span>Projets</span></span></h1>

        <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
        <p>Something knows About Our Cases</p>
    </div>

    <div class="row blog-load">
        @foreach ($projets as $projet)
                
        @if($projet->typeArticle->libelle==='Projet'&& $projet->est_publie===1  )
            <div class="col-lg-3 col-md-6 ">
                <div class="our-service-box" style="min-height:550px;">
                    <div class="our-service-img">
                        <img src="{{ isset($projet->photo) ? asset('storage/commune/articles/photos/'. $projet->photo) : asset('themev1/images/default.png') }}" alt="Service Image">
                    </div>
                    <div class="our-service-content">
                    <h6><a href="service-details.html">{{Str::upper($projet->titre)}}</a></h6>
                        <span class="line"></span>
                        <p>
                        {!! \Illuminate\Support\Str::limit($projet->texte, 80, $end='...') !!}
                        </p>
                        <a href="service-details.html" class="theme-btn br-20">Voir Plus</a>
                    </div>
                </div>
            </div> 
            @endif
     @endforeach
    </div>
</div>

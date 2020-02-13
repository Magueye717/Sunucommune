<div class="container">
    <div class="section-title text-center">
        <h1 class="title"> <span>Nos <span>Projets</span></span></h1>

        <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
        <p>Something knows About Our Cases</p>
    </div>

    <div class="our-service-inner four-item-carousel">
        @foreach ($projets as $projet)

        @if($projet->typeArticle->libelle==='Projet'&& $projet->est_publie===1  )
                <div class="our-service-box" style="min-height:560px; max-height:560px;">
                    <div class="our-service-img">
                        <img src="{{ !empty($projet->photo) ? asset('storage/commune/articles/photos/'. $projet->photo) : asset('themev1/images/default.png') }}" height="200px" alt="Service Image">
                    </div>
                    <div class="our-service-content" style="min-height: 240px; max-height: 240px;">
                        <div  style="min-height: 80px; max-height: 80px;">
                            <h6 class="text-uppercase"><a>{{strip_tags(TruncateTexte::truncate($projet->titre,55))}}</a></h6>
                            <span class="line"></span>
                        </div>

                        <div style="min-height: 160px; max-height: 160px; padding-bottom: 0;">
                            <p>
                            {{ strip_tags(TruncateTexte::truncate($projet->texte, 450)) }}
                            </p>
                        </div>
                        <a href="service-details.html" class="theme-btn br-20">Voir Plus</a>
                    </div>
                </div>
            @endif
     @endforeach
    </div>
</div>

<ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
    <!-- <div class="carousel-item active" style="max-height: 962px;"> -->
    @foreach($actualites->sortByDesc('created_at')->slice(0, 3) as $actu)
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        @if($actu->est_publie===1)
            <img src="{{ isset($actu->photo) ? asset('storage/commune/articles/photos/'. $actu->photo) : asset('themev1/images/default.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3 style="color: whitesmoke;">{{ $actu->titre }}</h3>
                <h4 style="color: whitesmoke;">{{ strip_tags(TruncateTexte::truncate($actu->texte, 200))  }}</h4>
            </div>
        @endif
    </div>
 @endforeach
    {{-- <div class="carousel-item">
        <img src="assets/images/BG2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h3 style="color: whitesmoke;">Second slide label</h3>
            <h4 style="color:whitesmoke;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        </div>
    </div> --}}
</div>
<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>

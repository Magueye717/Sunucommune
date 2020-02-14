@extends('layouts.portail.portail')
@section('content')

<!-- Start: Slides  -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    @include('portail.carousel')

</div>


<!-- End:  slider -->

<!--====== BANNER PART START ======-->


<!--====== BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->
<div class="row container-fluid m-0 p-0 maire">
    <div class="col-md-4" style="background-color: #12BDE3; ">
        <div class="section-title text-center">
            <br>
            <h4 class="title " style=" color: white; "> BIENVENUE SUR LA PALTEFORME <span>SUNU COMMUNE</span>
                <ul class="divider"><img src="assets/images/Sep.png" alt=" "></ul>
            </h4>
        </div>
    </div>
    @if(isset($communeInfo))
    <div class="col-md-8" style="background-color: #1179D5; ">
        <div class="media align-middle mt-40" style="display: flex; align-items: center;">
            <img class="img-thumbnail" style="margin-bottom:48px; width: 20%; border-radius: 50%; !important"
            src="{{ !empty($communeInfo->photo_maire) ? asset('storage/commune/photos/' . $communeInfo->photo_maire) : asset('themev1/images/default.png') }}"
            alt="avatar" class="profil-avatar"  width="250px" alt="Team Member">
            <div class="media-body">

            <p style=" color: white; margin: 18px;">{{ strip_tags(TruncateTexte::truncate($communeInfo->mot_du_maire,850)) }}</p>
            <h7 class="ml-20" style=" color: yellow;"> M. {{Str::upper($communeInfo->maire)}} <a href="{{route('portail.info')}}"
                                                                           class="theme-btn mb-20 br-10"
                                                                           style="background-color: white; float: right; color: #12BDE3;">Présentation de la commune<i
                            class="fal fa-arrow-alt-right ml-15"> </i></a></h7>
            </div>

        </div>
    </div>
    @else
    <div class="col-md-8" style="background-color: #1179D5; ">


        <div class="media align-middle mt-40" style="display: flex; align-items: center;">
            <img class="img-thumbnail" style="margin-bottom:48px; width: 20%; border-radius: 50%; !important"
                 src="assets/images/maire.png" alt="Team Member">
            <div class="media-body">

                <p style=" color: white; margin: 18px;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Modi rem sit ipsam corrupti minus a consectetur adipisicing elit. Modi rem sit ipsam corrupti
                    minus a consectetur adipisicing elit Modi rem sit ipsam corrupti minus a consectetur adipisicing
                    elit. Modi ipsum dolor sit amet consectetur adipisicing elit. Modi rem sit ipsam corrupti minus
                    a consectetur adipisicing elit. Modi rem sit ipsam corrupti minus a fugit, ex iste nulla,
                    molestias inventore recusandae harum commodi. Vero impedit quibusdam fugit neque temporibus?</p>
                <h7 class="ml-20" style=" color: yellow;"> M.BAMBA FALL <a href="{{route('portail.info')}}"
                                                                           class="theme-btn mb-20 br-10"
                                                                           style="background-color: white; float: right; color: #12BDE3;">Présentation de la commune<i
                            class="fal fa-arrow-alt-right ml-15"> </i></a></h7>
            </div>
        </div>
    </div>
    @endif
</div>
<!--====== ABOUT PART ENDS ======-->

<!--====== EQUIPE MUNICIPALE ======-->
<div>
    @include('portail.equipe-municipale')
</div>


<!--====== PROJECTS PART START ======-->


<section class="our-service mb-150 mt-100 rmb-100">

    @include('portail.projets')


</section>

<!--====== PROJECTS PART END ======-->

<!-- ACTUALITES -->

<section class="blog-standard-area pt-5 pb-0">
    @include('portail.actualites-envents')

</section>


<!-- Deliberation -->
<section class=" container-fluid blog-standard-area pb-5 mb-5">
    <div class="row blog-sidebar ">

        <!-- Documentation Debut -->
        <div class="col-xl-4 col-lg-4 col-md-4">
            @include('portail.documentation')

        </div>
        <!-- Documentation Fin -->



        <!-- Agenda Debut -->
        <div class="col-xl-8 col-lg-8 col-md-8">
            @include('portail.agenda')

        </div>
        <!-- Agenda Fin -->

    </div>
</section>
<!-- TEAM -->
<!--====== PARTENAIRES PART START ======-->

<div class="brand-area mt-30 pb-130">
    @include('portail.partenaires')


</div>

<!--====== PARTENAIRES PART ENDS ======-->

@endsection


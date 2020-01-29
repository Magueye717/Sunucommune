<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.portail.partials.head')
</head>

<body>

<!--====== PRELOADER PART START ======-->

<div class="preloader" id="preloader">
    <div class="three ">
        <div class="loader" id="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!--====== PRELOADER PART START ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
    @include('layouts.portail.partials.header-area')

</header>

<!--====== HEADER PART ENDS ======-->
<!-- Start: Slides  -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    @include('layouts.portail.partials.carousel')

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
                <h7 class="ml-20" style=" color: yellow;"> M.BAMBA FALL <a href="blog-details.html"
                                                                           class="theme-btn mb-20 br-10"
                                                                           style="background-color: white; float: right; color: #12BDE3;">Présentation de la commune<i
                            class="fal fa-arrow-alt-right ml-15"> </i></a></h7>
            </div>
        </div>
    </div>
</div>
<!--====== ABOUT PART ENDS ======-->

<!--====== EQUIPE MUNICIPALE ======-->
<section class="team-page text-center mt-50 container-xl projet">
    @include('layouts.portail.partials.equipe-municipale')

</section>

<!--====== PROJECTS PART START ======-->


<section class="service-page mt-10">

    @include('layouts.portail.partials.projets')


</section>

<!--====== PROJECTS PART END ======-->

<!-- ACTUALITES -->

<section class="blog-standard-area pt-5 pb-0">
    @include('layouts.portail.partials.actualites-envents')

</section>


<!-- Deliberation -->
<section class=" container blog-standard-area pb-5 mb-5">
    <div class="row blog-sidebar ">

        <!-- Documentation Debut -->
        <div class="col-xl-4 col-lg-4 col-md-4">
            @include('layouts.portail.partials.documentation')

        </div>
        <!-- Documentation Fin -->



        <!-- Agenda Debut -->
        <div class="col-xl-8 col-lg-8 col-md-8">
            @include('layouts.portail.partials.agenda')

        </div>
        <!-- Agenda Fin -->

    </div>
</section>
<!-- TEAM -->
<!--====== PARTENAIRES PART START ======-->

<div class="brand-area mt-30 pb-130">
    @include('layouts.portail.partials.partenaires')


</div>

<!--====== PARTENAIRES PART ENDS ======-->

<!--====== FOOTER PART START ======-->

<footer class="footer-area pt-80">
    @include('layouts.portail.partials.footer')

</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== Scripts PART START ======-->

<!--====== SCRIPTS PART ENDS ======-->



@include('layouts.portail.partials.scripts')

</body>

</html>

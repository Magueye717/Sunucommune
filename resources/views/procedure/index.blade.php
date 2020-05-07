@extends('layouts.portail.portail')
@section('content')

<div class="banner-area page-title bg_cover" style="background-image: url(assets/images/baniere.png);">
    @include('procedure.baniere')
</div>

<div class="about-section about_pg">
    @include('procedure.info_commune')
</div>

<div class="services-area services-about" style="padding-top: 40px; padding-bottom: 80px;">
    @include('procedure.menu_card')
</div>

<div class="accordion-area">
    @include('procedure.tab_info')
</div>

@endsection

@extends('layouts.portail.portail')
@section('content')

<div class="banner-area page-title bg_cover" style="background-image: url(assets/images/baniere.png);">
    @include('participation.baniere')
</div>

<div class="services-area services-about" style="padding-top: 0px; padding-bottom: 100px;">
    @include('participation.menu_card')
</div>

<div class="counter-area about-counter mt-90">
    @include('participation.statistique')
</div>

@endsection
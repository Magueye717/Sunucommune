@extends('layouts.portail.portail')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
        <style type="text/css">
            #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
                height:640px;
            }
        </style>

<div class="banner-area page-title bg_cover" style="background-image: url(assets/images/baniere.png);">
    @include('infrastructure.baniere')
</div>

<div class="services-area services-about" style="padding-top: 40px; padding-bottom: 80px;">
    @include('infrastructure.carte')
</div>

@endsection

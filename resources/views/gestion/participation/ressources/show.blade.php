@extends('layouts.v1.default')

@section('title', 'Gestion des membres du cabinet')
@section('pageTitle', 'Gestion des membres du cabinet')

@section('filAriane')
    <li><a href="{{ route('ressources.index') }}">Gestion des infrastructures</a></li>
    <li class="active">Détails</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des infrastructures de la commune</h3>
                <p class="text-muted m-b-10">Détails</p>

                @include('gestion.participation.ressources.partials._detail')
            
            </div>
        </div>
    </div>
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
@endpush

@extends('layouts.v1.default')

@section('title', 'Gestion des membres du cabinet')
@section('pageTitle', 'Gestion des membres du cabinet')

@section('filAriane')
    <li><a href="{{ route('membre-cabinets.index') }}">Gestion des membres du cabinet</a></li>
    <li class="active">Détail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des utilisateurs</h3>
                <p class="text-muted m-b-10">Détail</p>

                @include('gestion.commune.membre_cabinets.partials._detail')
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

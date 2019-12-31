@extends('layouts.v1.default')

@section('title', 'Gestion des sondages')
@section('pageTitle', 'Gestion des sondages')

@section('filAriane')
    <li class="active">Gestion des Sondages</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Sondages</h3>
                <p class="text-muted m-b-30">Liste des sondages</p>

                {!! Form::model(new App\Models\Participation\Sondage(), ['route' => ['sondages.store'], 'role' => 'form',
                'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('gestion.participation.sondages.partials._form')
                {!! Form::close() !!}
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

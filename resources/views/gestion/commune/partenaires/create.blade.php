@extends('layouts.v1.default')

@section('title', 'Gestion des partenaires')
@section('pageTitle', 'Gestion des partenaires')

@section('filAriane')
    <li class="active">Gestion des Partenaires</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Partenaires</h3>
                <p class="text-muted m-b-30">Liste des partenaires</p>

                {!! Form::model(new App\Models\Commune\Partenaire(), ['route' => ['partenaires.store'], 'role' => 'form',
                'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('gestion.commune.partenaires.partials._form')
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

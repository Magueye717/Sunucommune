@extends('layouts.v1.default')

@section('title', 'Informations de ma commune')
@section('pageTitle', 'Informations de ma commune')

@section('filAriane')
    <li><a href="#ma-commune">Ma commune</a></li>
    <li class="active">Informations de ma commune</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Informations de ma commune</h3>
                <p class="text-muted m-b-30">Création</p>

                {!! Form::model(new App\Models\Commune\AncienMaire(), ['route' => ['ancien-maires.store'], 'role' => 'form',
                'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('gestion.commune.anciens_maires.partials._form')
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

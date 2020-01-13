@extends('layouts.v1.default')

@section('title', 'Gestion de la Planification')
@section('pageTitle', 'Gestion des activité')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('panels.index') }}">Panel</a>
    <a class="breadcrumb-item active" href="#">Ajout</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des panels</h3>
                <p class="text-muted m-b-30">Ajout</p>

                {!! Form::model(new App\Models\Participation\Panel(), ['route' => ['panels.store'], 'role' => 'form',
                'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('gestion.panel.partials._form')
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

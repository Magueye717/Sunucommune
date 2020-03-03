@extends('layouts.v1.default')

@section('title', 'Gestion des utilisateurs')
@section('pageTitle', 'Gestion des utilisateurs')

@section('filAriane')
    <li><a href="{{ route('users.index') }}">Gestion des utilisateurs</a></li>
    <li class="active">Modification</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des membres du cabinet</h3>
                <p class="text-muted m-b-20">Création</p>

                {!! Form::model($ressource, ['method' =>'PATCH','route' => ['ressources.update',$ressource], 'role' => 'form',
                'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                 @include('gestion.participation.ressources.partials._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('stylesAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.style')
    @include('layouts.v1.partials.datepicker.style')
@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.script')
    @include('layouts.v1.partials.datepicker.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

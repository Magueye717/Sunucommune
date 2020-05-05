@extends('layouts.v1.default')

@section('title', 'Gestion des membres du cabinet')
@section('pageTitle', 'Gestion des membres du cabinet')

@section('filAriane')
    <li><a href="{{ route('contrats.index') }}">Gestion des contrats</a></li>
    <li class="active">Création</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des contrats</h3>
                <p class="text-muted m-b-20">Création</p>
                {!! Form::open(['route' => 'contrats.store', 'class' => 'form-horizontal panel']) !!}
                @include('rh.contrat.partials._form')
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

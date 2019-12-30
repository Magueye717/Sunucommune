@extends('layouts.v1.default')

@section('title', 'Changement de mot passe')
@section('pageTitle', 'Changement de mot passe')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('mon.profil') }}">Mon profil</a>
    <a class="breadcrumb-item active" href="#">Changement de mot passe</a>
@endsection

@section('content')
    <div class="white-box">
        <h3 class="box-title m-b-0">Changement de mot passe</h3>
        {!! Form::open(array('route' => 'reset.my.password', 'method' => 'post',
            'role' => 'form', 'id' => 'padess-form', 'class' => 'padess-form', 'data-toggle' => 'validator')) !!}
        @include('gestion.profil.partials._form_edit_pwd')
        {!! Form::close() !!}
    </div>
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
@endpush

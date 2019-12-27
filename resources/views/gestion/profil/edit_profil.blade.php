@extends('layouts.v3.default')

@section('title', 'Modification des informations du profil')
@section('pageTitle', 'Modification des informations du profil')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('mon.profil') }}">Mon profil</a>
    <a class="breadcrumb-item active" href="#">Mettre à jour</a>
@endsection

@section('content')
    <div class="white-box">
        <h3 class="box-title m-b-0">Modification des informations du profil</h3>
        {!! Form::model($user, ['method' =>'POST',
                            'route' => ['edit.my.profile'], 'role' => 'form',
                            'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
        @include('gestion.profil.partials._form_edit_profil')
        {!! Form::close() !!}
    </div>
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
@endpush

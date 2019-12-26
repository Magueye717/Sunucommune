@extends('layouts.app')

@section('title', 'Gestion des rôles')
@section('pageTitle', 'Gestion des rôles')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('roles.index') }}">Gestion des rôles</a>
    <a class="breadcrumb-item active" href="#">Création</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des rôles</h3>
                <p class="text-muted m-b-30">Création</p>

                {!! Form::model(new Spatie\Permission\Models\Role(), ['route' => ['roles.store'], 'role' => 'form', 'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                @include('admin.securite.roles.partials._form')
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

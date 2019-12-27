@extends('layouts.v1.default_admin')

@section('title', 'Gestion des utilisateurs')
@section('pageTitle', 'Gestion des utilisateurs')

@section('filAriane')
    <li><a href="{{ route('users.index') }}">Gestion des utilisateurs</a></li>
    <li class="active">Création</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des utilisateurs</h3>
                <p class="text-muted m-b-20">Création</p>

                {!! Form::model(new App\Models\User(), ['route' => ['users.store'], 'role' => 'form',
                'class' => 'padess-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('admin.users.partials._form')
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

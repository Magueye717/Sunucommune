@extends('layouts.app')

@section('title', 'Gestion des permissions')
@section('pageTitle', 'Gestion des permissions')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('permissions.index') }}">Gestion des permissions</a>
    <a class="breadcrumb-item active" href="#">Modification</a>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gestion des permissions</div>

                <div class="card-body">
                    {!! Form::model($permission, ['method' =>'PATCH',
                                'route' => ['permissions.update', $permission], 'role' => 'form',
                                'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                    @include('admin.securite.permissions.partials._form')
                    {!! Form::close() !!}
                </div>
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

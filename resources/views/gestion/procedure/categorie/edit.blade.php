@extends('layouts.v1.default')

@section('title', 'Gestion du categorie')
@section('pageTitle', 'Gestion des categories')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('categories.index') }}">categorie</a>
    <a class="breadcrumb-item active" href="#">Edition</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box col-md-12">
                <h3 class="box-title m-b-0">Gestion des categories</h3>
                <p class="text-muted m-b-30">Modification</p>

                {!! Form::model($categories, ['method' =>'PATCH', 'route' => ['categories.update', $categories], 'role' => 'form',
                                            'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                @include('gestion.procedure.categorie.partials._form')
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

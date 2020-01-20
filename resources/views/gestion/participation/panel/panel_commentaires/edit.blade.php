@extends('layouts.v1.default')

@section('title', 'Gestion du panel')
@section('pageTitle', 'Gestion des panels')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('panels.index') }}">Panel</a>
    <a class="breadcrumb-item active" href="#">Edition</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box col-md-12">
                <h3 class="box-title m-b-0">Gestion des panels</h3>
                <p class="text-muted m-b-30">Modification</p>
                {!! Form::model($commentaires, ['method' =>'PATCH', 'route' => ['commentaires.update', $commentaires], 'role' => 'form',
                                            'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                @include('gestion.participation.panel.panel_commentaires.partials._form')
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

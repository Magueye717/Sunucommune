@extends('layouts.v1.default')

@section('title', 'Gestion du thematique')
@section('pageTitle', 'Gestion des thematiques')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('thematiques.index') }}">thematique</a>
    <a class="breadcrumb-item active" href="#">Edition</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box col-md-12">
                <h3 class="box-title m-b-0">Gestion des thematiques</h3>
                <p class="text-muted m-b-30">Modification</p>

                {!! Form::model($thematiques, ['method' =>'PATCH', 'route' => ['thematiques.update', $thematiques], 'role' => 'form',
                                            'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                @include('gestion.participation.thematique.partials._form')
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

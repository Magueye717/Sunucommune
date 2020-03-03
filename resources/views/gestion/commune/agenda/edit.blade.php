@extends('layouts.v1.default')

@section('title', 'Gestion des articles')
@section('pageTitle', 'Gestion des articles')

@section('filAriane')
    <li><a href="{{ route('articles.index') }}">Gestion des articles</a></li>
    <li class="active">Edition</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des articles</h3>
                <p class="text-muted m-b-20">Edition</p>

                {!! Form::model($agenda, ['method' =>'PATCH',
                            'route' => ['agendas.update', $agenda->id], 'role' => 'form',
                            'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('gestion.commune.agenda.partials._form')
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

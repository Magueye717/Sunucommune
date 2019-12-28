@extends('layouts.v1.default')

@section('title', 'Changement d\'avatar')
@section('pageTitle', 'Changement d\'avatar')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('mon.profil') }}">Mon profil</a>
    <a class="breadcrumb-item active" href="#">Changement d'avatar</a>
@endsection

@section('content')
    <div class="white-box">
        <h3 class="box-title m-b-0">Changement d'avatar</h3>

        {!! Form::open(array('route' => 'change.my.avatar', 'method' => 'post', 'data-toggle' => 'validator',
            'role' => 'form', 'files' => 'true', 'id' => 'padess-form', 'class' => 'padess-form')) !!}
        <div class="form-body">
            <div class="row m-b-20">
                <div class="col-lg-6">
                    <div class="form-group m-t-10">
                        <label class="control-label">Photo : <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            {!! Form::file('avatar', ['id' => 'avatar', 'class' => 'custom-file-input', 'placeholder'=>'Choisir une photo', 'required' => '']) !!}
                            <label class="custom-file-label" for="fichier">Choisir un fichier</label>
                        </div>
                        <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                        @if(isset($user) && !empty($user->avatar))
                            <img class="avatar-min" src="{{ asset('storage/images/users/'. $user->avatar) }}"
                                 alt="avatar"
                                 title="Actuel avatar"/>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Enregistrer</button>
                <a href="{{ route('mon.profil') }}" class="btn btn-default">Annuler</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
    <script>
        $(function () {
            'use strict';
            //Custom file input
            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });
    </script>
@endpush

@extends('layouts.v3.default')

@section('title', 'Mon profil')
@section('pageTitle', 'Mon profil')

@section('filAriane')
    <a class="breadcrumb-item active" href="#">Mon profil</a>
@endsection

@section('content')
    <div class="white-box">
        <h3 class="box-title m-b-0">Mon profil</h3>
        <p class="text-muted m-b-30">Détail de mon profil</p>

        <div class="row">
            <div class="col-md-12 m-b-20">
                <a href="{{ route('change.avatar') }}" class="btn btn-primary pull-right">
                    <i class="ti-user"></i> Changer mon avatar
                </a>
                <a href="{{ route('reset.password') }}" class="btn btn-danger pull-right m-r-5">
                    <i class="ti-key"></i> Changer mon mot de passe
                </a>
                <a href="{{ route('edit.profile') }}" class="btn btn-info pull-right m-r-5">
                    <i class="ti-pencil-alt"></i> Mettre à jour
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ isset($user->avatar) ? asset('storage/images/users/' . $user->avatar) : asset('themev1/images/default.png') }}"
                     alt="avatar" class="profil-avatar">
            </div>
            <div class="col-sm-8 mg-t-20 mg-sm-t-0-force">
                <ul class="list-group list-group-striped">
                    <li class="list-group-item">
                        <p class="mg-b-0">
                            <strong class="tx-inverse tx-medium">Identité : </strong>
                            <span class="text-muted">{{ $user->identite }}</span>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="mg-b-0">
                            <strong class="tx-inverse tx-medium">Rôle : </strong>
                            <span class="text-muted">
                                @foreach($user->roles as $role)
                                    <span class="label label-primary m-l-5">
                                        {{ $role->description }}
                                    </span>
                                @endforeach
                            </span>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="mg-b-0">
                            <strong class="tx-inverse tx-medium">Entité : </strong>
                            <span class="text-muted"> {{ $user->entite->nom }} </span>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="mg-b-0">
                            <strong class="tx-inverse tx-medium">Adresse : </strong>
                            <span class="text-muted"> {{ $user->adresse }} </span>
                        </p>
                    </li>
                </ul>
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

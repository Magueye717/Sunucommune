@extends('layouts.v1.default')

@section('title', 'Informations de ma commune')
@section('pageTitle', 'Informations de ma commune')

@section('filAriane')
    <li><a href="#ma-commune">Ma commune</a></li>
    <li class="active">Informations de ma commune</li>
@endsection

@section('content')
    <div class="white-box">
        <h3 class="box-title m-b-0">Informations de ma commune</h3>
        <p class="text-muted m-b-30">Détail</p>

        @if(empty($communeInfo))
            <div class="row">
                <div class="col-md-12 m-b-20">
                    <a href="{{ route('infos.create') }}" class="btn btn-primary pull-right m-r-5">
                        <i class="ti-plus"></i> Créer la page d'information
                    </a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 m-b-20">
                    <a href="{{ route('infos.edit', $communeInfo) }}" class="btn btn-info pull-right m-r-5">
                        <i class="ti-pencil-alt"></i> Mettre à jour
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <img src="{{ isset($communeInfo->photo_maire) ? asset('storage/commune/photos/' . $communeInfo->photo_maire) : asset('themev1/images/default.png') }}"
                         alt="avatar" class="profil-avatar">
                </div>
                <div class="col-lg-10 col-md-9">
                    <ul class="list-group list-group-striped list-unstyled">
                        <li>
                            <p class="m-b-15">
                                <strong class="tx-inverse tx-medium">Prénom & Nom du Maire : </strong>
                                <span class="text-muted">{{ $communeInfo->maire }}</span>
                            </p>
                        </li>
                        <li>
                            <p class="m-b-15">
                                <strong class="tx-inverse tx-medium">Date de création de la commune : </strong>
                                <span class="text-muted"> {{ $communeInfo->date_creation }} </span>
                            </p>
                        </li>
                        <li>
                            <p class="m-b-15">
                                <strong class="tx-inverse tx-medium">Superficie de la commune (en m²) : </strong>
                                <span class="text-muted"> {{ $communeInfo->superficie }} </span>
                            </p>
                        </li>
                        <li>
                            <p class="m-b-15">
                                <strong class="tx-inverse tx-medium">Population : </strong>
                                <span class="text-muted"> {{ $communeInfo->population }} </span>
                            </p>
                        </li>
                        <li>
                            <p class="m-b-5"><strong class="tx-inverse tx-medium">Mot du maire</strong></p>
                        </li>
                        <li>
                            <p>
                                <span class="text-muted"> {!! $communeInfo->mot_du_maire !!} </span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
@endpush

@php
    $defaultTab = $historiqueTab = $ancienMaireTab = '';
    if (Session::has('historique')) $historiqueTab = 'active';
    elseif (Session::has('ancien-maire')) $ancienMaireTab = 'active';
    else $defaultTab ='active';
@endphp

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
        {{-- Actions nav --}}
        @include('gestion.commune.infos.partials._actions')

        <div class="row m-t-15">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item {{ $defaultTab }}">
                        <a class="nav-link" id="infos-tab" data-toggle="pill"
                           href="#infos" role="tab" aria-controls="infos" aria-selected="true">
                            Informations sur la commune</a>
                    </li>
                    <li class="nav-item {{ $historiqueTab }}">
                        <a class="nav-link" id="historique-tab" data-toggle="pill"
                           href="#historique" role="tab" aria-controls="historique" aria-selected="true">
                            Historique</a>
                    </li>
                    @if(!isset($ancienMaires))
                        <li class="nav-item {{ $ancienMaireTab }}">
                            <a class="nav-link" id="ancien-maire-tab" data-toggle="pill"
                               href="#ancien-maire" role="tab" aria-controls="ancien-maire" aria-selected="true">
                                Anciens maires</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane {{ $defaultTab }}" id="infos" role="tabpanel"
                         aria-labelledby="infos-tab">
                        @include('gestion.commune.infos.partials._detail_infos')
                    </div>
                    <div class="tab-pane {{ $historiqueTab }}" id="historique" role="tabpanel"
                         aria-labelledby="historique-tab">
                        @if(!empty($historique))
                            @include('gestion.commune.infos.partials._detail_historique')
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <p> L'historique de la commune doit être renseigné pour être visible.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if(isset($ancienMaires))
                        <div class="tab-pane {{ $ancienMaireTab }}" id="ancien-maire" role="tabpanel"
                             aria-labelledby="ancien-maire-tab">
                            @include('gestion.commune.infos.partials._detail_ancien_maires')
                        </div>
                    @endif
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

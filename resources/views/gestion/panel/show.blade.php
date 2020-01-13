@extends('layouts.v1.default')

@section('title', 'Gestion de la planification')
@section('pageTitle', 'Gestion des activités')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('panels.index') }}">Panels</a>
    <a class="breadcrumb-item active" href="#">Détail</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Panels</h3>
                <p class="text-muted m-b-0">Détail du panel</p>


                <div class="row m-t-15">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 m-b-15">
                                <div class="d-inline pull-right">
                                    <a href="{{ route('commentaires.create') }}" class="btn btn-info btn-wth-icon">
                                        <i class="ti-plus m-r-5"></i> Ajouter un commentaire
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="activite" role="tabpanel"
                                 aria-labelledby="activite-tab">
                                @include('gestion.panel.partials._detail')
                            </div>
                        </div>
                    </div>
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

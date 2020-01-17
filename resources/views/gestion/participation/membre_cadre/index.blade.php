@extends('layouts.v1.default')

@section('title', 'Gestion des utilisateurs')
@section('pageTitle', 'Gestion des membres du cabinet')

@section('filAriane')
    <li class="active">cadres de concertation</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion participation</h3>
                <p class="text-muted m-b-10">Liste des cadres de la participation</p>

                <div class="row">
                    <div class="col-sm-12 m-b-30 m-t-5">
                        <a href="{{ route('membre_cadres.create') }}">
                            <span class="pull-right m-b-10">
                                <button class="btn btn-primary btn-block m-b-10">
                                    <i class="ti-plus m-r-5"></i> Ajouter un membre
                                </button>
                            </span>
                        </a>
                    </div>
                </div>

                @include('gestion.participation.membre_cadre.partials._liste')
            </div>
        </div>
    </div>
@endsection

@section('stylesAdditionnels')
    @include('layouts.v1.partials.datatables.style')
    @include('layouts.v1.partials.swal.style')
@endsection

@section('scriptsAdditionnels')
    @include('layouts.v1.partials.datatables.script')
    <script src="{{ asset('themev1/js/datatables/basic.js') }}"></script>
    @include('layouts.v1.partials.swal.script')
@endsection

@push('myJS')
@endpush

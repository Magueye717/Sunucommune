@extends('layouts.v1.default')

@section('title', 'Gestion des sondages')
@section('pageTitle', 'Gestion des sondages')

@section('filAriane')
    <li class="active">Gestion des Sondages</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Sondages</h3>
                <p class="text-muted m-b-30">Liste des sondages</p>

                <div class="row">
                    <div class="col-sm-12 m-b-30 m-t-5">
                        <a href="{{ route('sondages.create') }}">
                            <span class="pull-right m-b-10">
                                <button class="btn btn-primary btn-block m-b-10">
                                    <i class="ti-plus m-r-5"></i> Ajouter un sondage
                                </button>
                            </span>
                        </a>
                    </div>
                </div>

                @include('gestion.participation.sondages.partials._liste')
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

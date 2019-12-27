@extends('layouts.v1.default_admin')


@section('title', 'Gestion des partenaires')
@section('pageTitle', 'Gestion des partenaires')

@section('filAriane')
    <li class="active">Gestion des Partenaires</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Partenaires</h3>
                <p class="text-muted m-b-30">Liste des partenaires</p>

                <div class="row">
                    <div class="col-sm-12 m-b-30 m-t-5">
                        <a href="{{ route('partenaires.create') }}">
                            <span class="pull-right m-b-10">
                                <button class="btn btn-primary btn-block m-b-10">
                                    <i class="ti-plus m-r-5"></i> Ajouter un partenaire
                                </button>
                            </span>
                        </a>
                    </div>

                </div>

                @include('admin.commune.partenaires.partials._liste')
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

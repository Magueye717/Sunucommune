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
                <h3 class="box-title m-b-0">Gestion des ressources</h3>
                <p class="text-muted m-b-10">Liste des ressources de la commune</p>
                    <div class="col-sm-12 m-t-5">
                        <a href="{{ route('ressources.create') }}">
                            <span class="pull-right m-b-10">
                                <button class="btn btn-primary btn-block m-b-10">
                                    <i class="ti-plus m-r-5"></i> Ajouter une ressource
                                </button>
                            </span>
                        </a>
                    </div>
                    @include('gestion.participation.ressources.partials._liste')
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
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e7200481166b878"></script>

    @include('layouts.v1.partials.swal.script')
@endsection

@push('myJS')
@endpush

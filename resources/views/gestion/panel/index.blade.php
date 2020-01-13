@extends('layouts.v1.default')

@section('title', 'Gestion des bénéficiaires')
@section('pageTitle', 'Gestion des bénéficiaires')

@section('filAriane')
    <a class="breadcrumb-item" href="{{ route('panels.index') }}">Panels</a>
    <a class="breadcrumb-item active" href="#">Liste des panels</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des panels</h3>
                <p class="text-muted m-b-10">panels</p>

                {{-- Actions disponibles --}}
                <div class="row">
                    <div class="col-md-12 m-b-15">
                        <div class="d-inline pull-right">
                            <a href="{{ route('panels.create') }}"
                               class="btn btn-primary btn-wth-icon">
                                <i class="ti-plus m-r-5"></i> Ajouter un panel
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Liste des comités --}}
                @include('gestion.panel.partials._liste')
            </div>
        </div>
    </div>
@endsection

@section('stylesAdditionnels')
    {{-- @include('layouts.v3.partials.datatables.style')--}}
    @include('layouts.v1.partials.swal.style')
    @include('layouts.v1.partials.custom-select.style')
    @include('layouts.v1.partials.datepicker.style')
@endsection

@section('scriptsAdditionnels')
    {{--@include('layouts.v3.partials.datatables.script')
    <script type="text/javascript" src="{{ asset('themev3/js/datatables/basic.js') }}"></script>--}}
    @include('layouts.v1.partials.swal.script')
    @include('layouts.v1.partials.custom-select.script')
    @include('layouts.v1.partials.datepicker.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection




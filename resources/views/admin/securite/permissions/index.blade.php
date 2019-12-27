@extends('layouts.v1.default_admin')

@section('title', 'Gestion des permissions')
@section('pageTitle', 'Gestion des permissions')

@section('filAriane')
    <li class="active">Gestion des permissions</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des permissions</h3>
                <p class="text-muted m-b-30">Liste des permissions</p>

                @include('admin.securite.permissions.partials._liste')
            </div>
        </div>
    </div>
@endsection

@section('stylesAdditionnels')
    @include('layouts.v1.partials.datatables.style')
@endsection

@section('scriptsAdditionnels')
    @include('layouts.v1.partials.datatables.script')
    <script src="{{ asset('themev1/js/datatables/basic.js') }}"></script>
@endsection

@push('myJS')
@endpush

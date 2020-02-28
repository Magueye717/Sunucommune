@extends('layouts.v1.default')

@section('title', 'Gestion des articles')
@section('pageTitle', 'Gestion des articles')

@section('filAriane')
    <li class="active">Gestion des médias</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des médias</h3>
                <p class="text-muted m-b-10">Détail</p>

                @include('gestion.commune.agenda.partials._detail')
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

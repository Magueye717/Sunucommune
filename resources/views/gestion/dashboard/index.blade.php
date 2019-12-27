@extends('layouts.v1.default')

@section('title', 'Tableau de bord')
@section('pageTitle', 'Tableau de bord')

@section('content')
    <div class="row m-b-30">
        <div class="col-md-12">
            <h5 class="my-title"><i class="fa fa-fw fa-dashboard m-r-5"></i> Tableau de bord</h5>
        </div>
    </div>
    @include('gestion.dashboard.partials._detail')
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
@endpush

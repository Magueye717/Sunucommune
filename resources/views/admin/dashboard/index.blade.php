@extends('layouts.v1.default_admin')

@section('title', 'Tableau de bord')
@section('pageTitle', 'Tableau de bord')

@section('content')
    @include('admin.dashboard.partials._detail')
@endsection

@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')
@endpush

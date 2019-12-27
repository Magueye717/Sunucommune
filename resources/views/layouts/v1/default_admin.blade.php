@extends('layouts.v1.default')

@section('partie_administrative')
    <li>
        <a href="{{ route('accueil') }}">
            <i class="ti-home"></i> Retourner à l'accueil
        </a>
    </li>
@endsection

@section('pageheader')
    @include('layouts.v1.partials.pageheader_admin')
@endsection

@section('menu')
    @include('layouts.v1.partials.sidebar_admin')
@endsection
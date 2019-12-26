@extends('layouts.app')

@section('title', 'Gestion des utilisateurs')
@section('pageTitle', 'Gestion des utilisateurs')

@section('filAriane')
    <a class="breadcrumb-item active" href="#">Gestion des utilisateurs</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des utilisateurs</h3>
                <p class="text-muted m-b-10">Liste des utilisateurs</p>

                <div class="row">
                    <div class="col-sm-12 m-b-30 m-t-5">
                        <a href="{{ route('users.create') }}">
                            <span class="pull-right m-b-10">
                                <button class="btn btn-primary mb-2">
                                    <i class="ti-plus m-r-5"></i> Ajouter un utilisateur
                                </button>
                            </span>
                        </a>
                    </div>
                </div>

                @include('admin.users.partials._liste')
            </div>
        </div>
    </div>
@endsection


@push('myJS')
@endpush

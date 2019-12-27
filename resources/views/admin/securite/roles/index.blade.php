@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Gestion des Roles</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div style="padding: 0px 0" class="text-rightc">
                       <a href="{{ route('roles.create') }}" class="text-inverse p-r-10" title="Ajouter Role">
                           <i class="ti-marker-alt"></i> <span class="btn btn-primary">Ajouter Role</span>
                       </a>
                   </div>
                        <br>

                    @include('admin.securite.roles.partials._liste')
                </div>
            </div>
        </div>
    </div>
@endsection

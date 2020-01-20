@extends('layouts.v1.default_admin')

@section('title', 'Gestion des utilisateurs')
@section('pageTitle', 'Gestion des utilisateurs')

@section('filAriane')
    <li><a href="{{ route('users.index') }}">Gestion des utilisateurs</a></li>
    <li class="active">Modification</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des utilisateurs</h3>
                <p class="text-muted m-b-20">Modification</p>

                {!! Form::model($user, ['method' =>'PATCH',
                            'route' => ['users.update', $user], 'role' => 'form',
                            'class' => 'padess-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
                @include('admin.users.partials._form')
                {!! Form::close() !!}
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

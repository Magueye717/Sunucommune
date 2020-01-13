@extends('layouts.v1.default_admin')

@section('title', 'Gestion des permissions')
@section('pageTitle', 'Gestion des permissions')

@section('filAriane')
    <li><a href="{{ route('permissions.index') }}">Gestion des permissions</a></li>
    <li class="active">Modification</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des permissions</h3>
                <p class="text-muted m-b-30">Modification</p>

                {!! Form::model($permission, ['method' =>'PATCH',
                            'route' => ['permissions.update', $permission], 'role' => 'form',
                            'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                @include('admin.securite.permissions.partials._form')
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

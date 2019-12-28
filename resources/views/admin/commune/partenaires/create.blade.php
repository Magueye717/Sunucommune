@extends('layouts.v1.default_admin')


@section('title', 'Gestion des partenaires')
@section('pageTitle', 'Gestion des partenaires')

@section('filAriane')
    <li class="active">Gestion des Partenaires</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Partenaires</h3>
                <p class="text-muted m-b-30">Liste des partenaires</p>

                {!! Form::model(new Spatie\Permission\Models\Role(), ['route' => ['partenaires.store'], 'role' => 'form', 'class' => 'padess-form', 'data-toggle' => 'validator']) !!}
                @include('admin.commune.partenaires.partials._form')
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

@extends('layouts.v1.default')

@section('title', 'Gestion des agents')
@section('pageTitle', 'Gestion des agents')

@section('filAriane')
    <li><a href="{{ route('agents.index') }}">Gestion des agents</a></li>
    <li class="active">Modification</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des agents</h3>
                <p class="text-muted m-b-20">Modification</p>

                {!! Form::model($agent, ['method' =>'PATCH','route' => ['agents.update',$agent], 'role' => 'form',
                'class' => 'sunucommune-form', 'data-toggle' => 'validator', 'files' => true]) !!}

                 @include('rh.agent.partials._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('stylesAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.style')
    @include('layouts.v1.partials.datepicker.style')
@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.script')
    @include('layouts.v1.partials.datepicker.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

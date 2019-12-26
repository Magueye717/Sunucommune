@extends('layouts.app')

@section('content')
    <div>
        <div class="col-md-12">
            <div class="white-box col-md-12">
                {!! Form::open(['route' => 'commune.store', 'class' => 'form-horizontal panel']) !!}
                @include('commune.partials._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


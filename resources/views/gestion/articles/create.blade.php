@extends('layouts.v1.default')
@section('content')
<div>
    <div class="col-md-12">
        <div class="white-box col-md-12">
            {!! Form::open(['route' => 'articles.store', 'class' => 'form-horizontal panel', 'enctype'=>'multipart/form-data']) !!}
            @include('gestion.articles.partials._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

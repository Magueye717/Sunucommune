@extends('layouts.v1.default')
@section('content')
<div>
    <div class="col-md-12">
        <div class="white-box col-md-12">
            {!! Form::open(['route' => 'type_articles.store', 'class' => 'form-horizontal panel', 'enctype'=>'multipart/form-data']) !!}
            @include('gestion.type_article.partials._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

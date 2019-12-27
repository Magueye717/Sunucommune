@extends('layouts.v1.default')
@section('content')
<div>
    <div class="col-md-12">
        <div class="white-box col-md-12">
            {!! Form::model($article, ['method' =>'PATCH',
            'route' => ['articles.update', $article], 'role' => 'form',
            'class' => 'padess-form', 'data-toggle' => 'validator', 'files' => 'true']) !!}
            @include('gestion.articles.partials._form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

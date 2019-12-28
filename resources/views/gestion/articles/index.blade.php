@extends('layouts.v1.default')
@section('content')

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <div class="float-right pb-5">
        <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Ajouter article</a>
    </div>
    <br>
    <div class="container-fluid row white-box">
    @foreach ( $articles as $article )
    <div class="col-md-4 pb-5">
        <div class="card shadow rounded rounded-lg" style="width:400px; height:450px;">
        <div class="card-header"> <h2>{{$article->titre}}</h2></div>
        <img class="card-img-top" src="{{asset('storage/documentUpload/'.$article->photo)}}" alt="image" style="width:100%; height:200px;">
        <div class="card-body">

        <p class="card-text" style="-webkit-line-clamp: 12;
        overflow : hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;">
            {{$article->texte}}
        </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">En savoir +</a>
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary float-none">Modifier +</a>

            {!! Form::open([
                'method' => 'DELETE',
                'style' => 'display: inline;',
                'route' => ['articles.destroy', $article->id]]) !!}
                {{ csrf_field() }}
                <button type="submit" href="#delete" class="btn-danger padess-delete" data-toggle="tooltip" title="Supprimer">
                <i class="ti-trash"></i>
                </button>
            {!! Form::close() !!}
        </div>
      </div>


    </div>
    @endforeach
</div>
  <br>
@endsection

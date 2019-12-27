@extends('layouts.v1.default')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>

<div class="container-fluid row">
    <div class="col-md-4">

        @foreach ( $articles as $article )
        <div class="card m-auto shadow p-3 mb-5 bg-white rounded rounded-lg" style="width:400px; height:450px;">
        <div class="card-header"> <h2>{{$article->titre}}</h2></div>
        <img class="card-img-top" src="{{asset('storage/documentUpload/'.$article->photo)}}" alt="image" style="width:100%">
        <div class="card-body">

        <p class="card-text">{{$article->texte}}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">En savoir +</a>
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary float-none">Modifier +</a>
        </div>
      </div>
      @endforeach

    </div>
</div>
  <br>
</body>
</html>

@endsection

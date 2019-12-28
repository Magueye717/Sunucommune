@extends('layouts.v1.default')
@section('content')
<div>
    <div class="col-md-12">
        <div class="white-box col-md-12">
            <div class="text-center">
                <div class="clearfix">
                    <img src="{{asset('storage/documentUpload/'.$article->photo)}}" style="width:30%;" alt="...">
                    <h1>{{$article->titre}}</h1>
                  </div>
                  <p>{{$article->texte}}.</p>
            </div>
        </div>
    </div>
</div>
@endsection

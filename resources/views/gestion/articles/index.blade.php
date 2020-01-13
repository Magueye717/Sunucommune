@extends('layouts.v1.default')
@section('content')

    <div class="float-right pb-5">
        <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Ajouter article</a>
        <a href="{{ route('type_articles.create') }}" class="btn btn-primary">+ Ajouter Un type d'article</a>
    </div>
    <br>
    <div class="container-fluid row">
        <div class="panel">
        <div class="panel-heading ">Liste des articles</div>
        <div class="panel-body">
            <table class="table" id="myTable">
                <thead>
                  <tr>
                        <th titre="col">Titre de l'article</th>
                        <th slug="col">Slug de l'article</th>
                        <th scope="col">Type d'article</th>
                        <th text="col">Contenu</th>
                        <th created_at="col">Ajouté le</th>
                        <th updated_at="col">Modifié le</th>
                        <th updated_at="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr role="row" class="odd">
                      <td>{{ $article->titre }}</td>
                      <td>{{ $article->slug}}</td>
                      <td>{{ $article->typeArticle->libelle}}</td>
                      <td>{{ $article->texte}}</td>
                      <td>{{ $article->created_at}}</td>
                      <td>{{ $article->updated_at}}</td>
                      <td><div class="card-footer">
                        <a href="{{ route('articles.show', $article) }}"> <i class="ti-eye"></i></a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary float-none"><i class="ti-pencil"></i></a>

                        {!! Form::open([
                            'method' => 'DELETE',
                            'style' => 'display: inline;',
                            'route' => ['articles.destroy', $article->id]]) !!}
                            {{ csrf_field() }}
                            <a type="submit" href="#delete" class="padess-delete" data-toggle="tooltip" title="Supprimer">
                            <i class="ti-trash"></i>
                            </a>
                        {!! Form::close() !!}
                    </div></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
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
<script>
    $(document).ready(function() {
       $('#myTable').DataTable();
  } )
</script>
@endpush

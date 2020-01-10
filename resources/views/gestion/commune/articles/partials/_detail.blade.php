<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-12">
        <div class="">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Titre : </strong>
                {{ $article->titre }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Type d'article : </strong>
                {{ $article->typeArticle->libelle }}
            </p>
        </div>
        <div class="m-t-15">
            <strong class="tx-inverse tx-medium">Illustration : </strong>
            <p class="mb-0">
                @if(!empty($article->photo))
                    <img src="{{ asset('storage/commune/articles/photos/'. $article->photo) }}" alt="Illustration"
                         class="img-responsive img-thumbnail m-t-10">
                @else
                    Aucune image d'illustration n'a été ajoutée...
                @endif
            </p>
        </div>
        <div class="m-t-15">
            <strong class="tx-inverse tx-medium">Texte : </strong>
            <p class="mt-2 d-block">
                {!! $article->texte !!}
            </p>
        </div>
        <div class="m-t-15">
            <strong class="tx-inverse tx-medium">Piéce-jointe : </strong>
            <p class="mb-0">
                @if(!empty($article->piece_jointe))
                    <a href="{{ asset('storage/commune/articles/files/'. $article->piece_jointe) }}"
                       target="_blank"> {{ $article->piece_jointe }} </a>
                @else
                    Aucune piéce-jointe...
                @endif
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Etat de publication : </strong>
                @if($article->estPublie())
                    <span class="label label-success">Publié</span>
                @else
                    <span class="label label-danger">Non publié</span>
                @endif
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Ajouter par : </strong>
                {{ $article->ajouterPar->identite }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Date de création : </strong>
                {{ $article->created_at }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Date de derniére modification : </strong>
                {{ $article->modified_at }}
            </p>
        </div>
    </div>
</div>

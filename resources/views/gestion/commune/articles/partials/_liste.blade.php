<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Titre</th>
            <th>Type d'article</th>
            <th>Est publié ?</th>
            <th>Ajouté par</th>
            <th>Date d'ajout</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($articles)
            @php $compteur = 1 @endphp
            @foreach($articles as $article)
                <tr>
                    <td class="text-center">{{ $compteur }}</td>
                    <td>{{ $article->titre }}</td>
                    <td>{{ $article->typeArticle->libelle }}</td>
                    <td class="text-center">
                        @if($article->estPublie())
                            <span class="label label-success">Oui</span>
                        @else
                            <span class="label label-danger">Non</span>
                        @endif
                    </td>
                    <td>{{ $article->ajouterPar->identite }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('articles.show', $article) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'PUT',
                                        'class' => 'sunucommune-form',
                                        'style' => 'display: inline;',
                                        'route' => array('articles.publication', $article))) !!}
                        {{ csrf_field() }}
                        @if($article->estPublie())
                            <a href="#depublie" class="text-warning sunucommune-confirm p-r-5" data-toggle="tooltip"
                               title="Dépublié">
                                <i class="ti-archive"></i>
                            </a>
                        @else
                            <a href="#publie" class="text-success sunucommune-confirm p-r-5" data-toggle="tooltip"
                               title="Publié">
                                <i class="ti-check-box"></i>
                            </a>
                        @endif
                        {!! Form::close() !!}
                        <a href="{{ route('articles.edit', $article) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('articles.destroy', $article))) !!}
                        {{ csrf_field() }}
                        <a href="#delete" class="text-danger sunucommune-delete" data-toggle="tooltip"
                           title="Supprimer">
                            <i class="ti-trash"></i>
                        </a>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @php $compteur++ @endphp
            @endforeach
        @endisset
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-12 m-t-20">
        <ul class="list-group list-group-striped">
            <li class="list-group-item">
                    <strong class="tx-inverse box-title tx-medium">Panel : </strong>
                    <span class="box-title tx-inverse">{{ $panels->question }}</span>
            </li>
        </ul>

        <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Commentaires</th>
            <th>Nom</th>
            <th>Nom</th>
            <th>Date de publication</th>
            <th>status</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($panels)
            @foreach($panels->commentaires as $commentaire)
                <tr>
                    <td>{{ $commentaire->commentaire }}</td>
                    <td>{{ $commentaire->nom }}</td>
                    <td>{{ $commentaire->email }}</td>
                    <td>{{ $commentaire->created_at }}</td>
                    <td class="text-center">
                        @if($commentaire->estActive())
                            <span class="label label-success">Oui</span>
                        @else
                            <span class="label label-danger">Non</span>
                        @endif
                    </td>
                    <td class="text-nowrap text-center">
                        {!! Form::open(array(
                            'method' => 'PUT',
                            'class' => 'sunucommune-form',
                            'style' => 'display: inline;',
                            'route' => array('commentaires.valider', $commentaire))) !!}
                        {{ csrf_field() }}
                        @if($commentaire->estActive())
                            <a href="#desactve" class="text-warning sunucommune-confirm p-r-5" data-toggle="tooltip"
                            title="Désactivé">
                                <i class="ti-archive"></i>
                            </a>
                        @else
                            <a href="#active" class="text-success sunucommune-confirm p-r-5" data-toggle="tooltip"
                            title="Activé">
                                <i class="ti-check-box"></i>
                            </a>
                        @endif
                        {!! Form::close() !!}
                        <a href="{{ route('commentaires.edit', $commentaire) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('commentaires.destroy', $commentaire))) !!}
                        {{ csrf_field() }}
                        <a href="#delete" class="text-danger sunucommune-delete" data-toggle="tooltip" title="Supprimer">
                            <i class="ti-trash"></i>
                        </a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
    </div>


</div>

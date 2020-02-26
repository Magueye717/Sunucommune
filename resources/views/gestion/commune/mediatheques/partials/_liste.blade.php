<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Type média</th>
            <th>Fichier</th>
            <th>description</th>
            <th>Rubrique</th>
            <th>Priorité</th>
            <th>Date d'ajout</th>
            <th>Date de modification</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($medias)
            @foreach($medias as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td>{{ $media->type_media }}</td>
                    <td>{{ $media->fichier }}</td>
                    <td>{{ $media->description }}</td>
                    <td class="text-center">
                        @if($media->estPublie())
                            <span class="label label-success">Oui</span>
                        @else
                            <span class="label label-danger">Non</span>
                        @endif
                    </td>
                    <td>{{ $media->rubrique }}</td>
                    <td>{{ $media->created_at }}</td>
                    <td>{{ $media->updated_at }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('mediatheques.show', $media) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>

                        {!! Form::open(array(
                            'method' => 'PUT',
                            'class' => 'sunucommune-form',
                            'style' => 'display: inline;',
                            'route' => array('mediatheques.publication', $media))) !!}
                        {{ csrf_field() }}
                        @if($media->estPublie())
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

                        <a href="{{ route('mediatheques.edit', $media) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('mediatheques.destroy', $media))) !!}
                        {{ csrf_field() }}
                        <a href="#delete" class="text-danger sunucommune-delete" data-toggle="tooltip"
                           title="Supprimer">
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

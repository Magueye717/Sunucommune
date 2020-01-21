<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Type média</th>
            <th>Fichier</th>
            <th>description</th>
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
                    <td>{{ $media->created_at }}</td>
                    <td>{{ $media->updated_at }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('mediatheques.show', $media) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>

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

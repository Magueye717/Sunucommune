<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Ajouté par</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($sondages)
            @foreach($sondages as $sondage)
                <tr>

                    <td>{{ $sondage->titre }}</td>
                    <td>{{ $sondage->description }}</td>
                    <td>{{ $sondage->slug }}</td>
                    <td>{{ $sondage->ajouterPar->prenom.' '.$sondage->ajouterPar->nom }}</td>

                    <td class="text-nowrap text-center">
                        <a href="{{ route('sondages.edit', $sondage) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('sondages.destroy', $sondage))) !!}
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

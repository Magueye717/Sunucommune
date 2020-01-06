<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Collectivité</th>
            <th>Date création</th>
            <th>Fichier</th>
            <th>Ajouté par:</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($cadres)
            @foreach($cadres as $cadre)
                <tr>
                    <td>{{ $cadre->nom }}</td>
                    <td>{{ $cadre->collectivite->nom }}</td>
                    <td>{{ $cadre->date_creation }}</td>
                    <td>{{ $cadre->fichier }}</td>
                    <td>{{ $cadre->ajouterPar->nom }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('cadres.edit', $cadre) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'delete-form',
                            'style' => 'display: inline;',
                            'route' => array('cadres.destroy', $cadre->id))) !!}
                         {{ csrf_field() }}
                        <a href="#delete" class="text-danger padess-delete" data-toggle="tooltip" title="Supprimer">
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

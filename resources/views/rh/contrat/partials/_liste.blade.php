<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Type</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Congé</th>
            <th>Agent</th>
            <th>Statut</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($contrats)
            @foreach($contrats as $contrat)
                <tr>
                    <td>{{ $contrat->nom }}</td>
                    <td>{{ $contrat->type_contrat }}</td>
                    <td>{{ $contrat->date_debut }}</td>
                    <td>{{ $contrat->date_fin }}</td>
                    <td>
                        @if($contrat->conge==1)
                        <span class="badge badge-pill badge-success">Oui</span>
                        @else
                        <span class="badge badge-pill badge-danger">Non</span>
                        @endif
                    </td>
                    <td>
                        {{ $contrat->agent->prenom." ".$contrat->agent->nom}}
                    </td>
                    <td>{{ $contrat->statut }}</td>

                    <td class="text-nowrap text-center">
                        <a href="{{ route('contrats.edit', $contrat) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'delete-form',
                            'style' => 'display: inline;',
                            'route' => array('contrats.destroy', $contrat->id))) !!}
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

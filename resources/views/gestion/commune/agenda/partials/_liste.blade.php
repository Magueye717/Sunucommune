<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titre</th>
            <th>photo</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>Quartier/village</th>
           
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($agendas)
            @foreach($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->libelle }}</td>
                    <td>{{ $agenda->photo }}</td>
                    <td>{{ $agenda->lieu }}</td>
                    <td>{{ $agenda->date_evenement }}</td>
                    <td>{{ $agenda->collectivite->nom }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('agendas.show', $agenda) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>

                        <a href="{{ route('agendas.edit', $agenda->id) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('agendas.destroy', $agenda->id))) !!}
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

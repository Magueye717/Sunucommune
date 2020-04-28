<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titre</th>
            <th>photo</th>
            <th>Lieu</th>
            <th>Est publié ?</th>
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
                    <td class="text-center">
                        @if($agenda->estPublie())
                            <span class="label label-success">Oui</span>
                        @else
                            <span class="label label-danger">Non</span>
                        @endif
                    </td>
                    <td>{{ $agenda->date_evenement }}</td>
                    <td>{{ $agenda->collectivite->nom }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('agendas.show', $agenda) }}" class="text-inverse p-r-5"
                           data-toggle="tooltip" title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>

                        {!! Form::open(array(
                            'method' => 'PUT',
                            'class' => 'sunucommune-form',
                            'style' => 'display: inline;',
                            'route' => array('agenda.publication', $agenda))) !!}
                            {{ csrf_field() }}
                            @if($agenda->estPublie())
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

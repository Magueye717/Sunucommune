<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Categorie</th>
            <th>lieu de depot</th>
            <th>status</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($procedures)
            @foreach($procedures as $procedure)
                <tr>
                    <td> {{ $procedure->titre }} </td>
                    <td><span class="label label-info">{{ $procedure->categorie->nom}}</span></td>
                    <td>{{ $procedure->lieu_depot }}</td>
                    <td class="text-center">
                        @if($procedure->estActive())
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Desactive</span>
                        @endif
                    </td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('procedures.show', $procedure) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Voir commentaires">
                            <i class="ti-info-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'PUT',
                            'class' => 'sunucommune-form',
                            'style' => 'display: inline;',
                            'route' => array('procedures.valider', $procedure))) !!}
                        {{ csrf_field() }}
                        @if($procedure->estActive())
                            <a href="#depublie" class="text-warning sunucommune-confirm p-r-5" data-toggle="tooltip"
                            title="Désactivé">
                                <i class="ti-archive"></i>
                            </a>
                        @else
                            <a href="#publie" class="text-success sunucommune-confirm p-r-5" data-toggle="tooltip"
                            title="Activé">
                                <i class="ti-check-box"></i>
                            </a>
                        @endif
                        {!! Form::close() !!}
                        <a href="{{ route('procedures.edit', $procedure) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('procedures.destroy', $procedure))) !!}
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

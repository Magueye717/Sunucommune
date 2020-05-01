<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($contrats)
            @foreach($contrats as $contrat)
                <tr>
                    <td>{{ $contrat->nom }}</td>
                    <td>{{ $contrat->type_contrat }}</td>
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

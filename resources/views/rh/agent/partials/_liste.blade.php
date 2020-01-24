<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Fonction</th>
            <th>Adresse</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Satut du memebre</th>
{{--            <th>Cadre de concertation</th>--}}
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($agents)
            @foreach($agents as $agent)
                <tr>
                    <td>{{ $agent->prenom }}</td>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->fonction }}</td>
                    <td>{{ $agent->adresse }}</td>
                    <td>{{ $agent->email }}</td>
                    <td>{{ $agent->telephone }}</td>
                    <td>{{ $agent->statut_agent }}</td>
{{--                    <td>{{ $agent->cadreConcertation->nom }}</td>--}}
                    <td class="text-nowrap text-center">
                        <a href="{{ route('agents.edit', $agent) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'delete-form',
                            'style' => 'display: inline;',
                            'route' => array('agents.destroy', $agent->id))) !!}
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

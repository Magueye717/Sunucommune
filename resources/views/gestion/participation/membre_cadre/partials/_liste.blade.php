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
            <th>Cadre de concertation</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($membreCadres)
            @foreach($membreCadres as $membreCadre)
                <tr>
                    <td>{{ $membreCadre->prenom }}</td>
                    <td>{{ $membreCadre->nom }}</td>
                    <td>{{ $membreCadre->fonction }}</td>
                    <td>{{ $membreCadre->adresse }}</td>
                    <td>{{ $membreCadre->email }}</td>
                    <td>{{ $membreCadre->telephone }}</td>
                    <td>{{ $membreCadre->statut_cadre }}</td>
                    <td>{{ $membreCadre->cadreConcertation->nom }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('membre_cadress.edit', $membreCadre) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'delete-form',
                            'style' => 'display: inline;',
                            'route' => array('membre_cadres.destroy', $cadre))) !!}
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

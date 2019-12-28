<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>img</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Fonction</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($membres)
            @foreach($membres as $membreCabinet)
                <tr>
                    <td><img src="{{ asset('storage/commune/membres/' .$membreCabinet->photo_membre) }}" alt="..." class="img-thumbnail" style="width:20%; height:2%; border-radius:10%;"></td>
                    <td>{{ $membreCabinet->prenom }}</td>
                    <td>{{ $membreCabinet->nom }}</td>
                    <td>{{ $membreCabinet->fonction }}</td>
                    <td>{{ $membreCabinet->adresse }}</td>
                    <td>{{ $membreCabinet->telephone }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('membre-cabinets.edit', $membreCabinet) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('membre-cabinets.destroy', $membreCabinet))) !!}
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
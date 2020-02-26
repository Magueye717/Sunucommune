<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>RS</th>
            <th>Photo</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Fonction</th>
            <th>Service</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($membres)
            @foreach($membres as $membreCabinet)
                <tr>
                    <td>
                    @foreach($membreCabinet->reseauxSociaux as $rs)
                    <div class="social-style-one">
                    {{-- <a href="{{ $rs->url }}"><i class="{{ $rs->logo }}"></i></a> --}}
                    <a href="#"><i class="btn-facebook"></i></a>
                    </div>
                    @endforeach
                    </td>
                    <td class="text-center">
                        <img src="{{ !empty($membreCabinet->photo) ? asset('storage/commune/membres/' .$membreCabinet->photo) : asset('themev1/images/default.png')}}"
                             alt="photo" class="img-thumbnail table-photo">
                    </td>
                    <td>{{ $membreCabinet->prenom }}</td>
                    <td>{{ $membreCabinet->nom }}</td>
                    <td>{{ $membreCabinet->fonction }}</td>
                    <td><span class="label label-info">{{ $membreCabinet->equipeMunicipale->libelle }}</span></td>
                    <td>{{ $membreCabinet->adresse }}</td>
                    <td>{{ $membreCabinet->telephone }}</td>
                    <td class="text-nowrap text-center">
                        <a href="" data-toggle="modal" data-target="#membreModalLong" class="text-inverse p-r-10" data-toggle="tooltip"
                        onclick="$('#reseau_id').val('{{$membreCabinet->id}}');"
                          title="Ajouter une réseau sociale">
                            <i class="ti-plus"></i>
                        </a>
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
    @include('gestion.commune.membre_cabinets.partials._modal_form')
</div>

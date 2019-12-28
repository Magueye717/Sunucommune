<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Logo</th>
            <th>Nom</th>
            <th>Type</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($partenaires)
            @foreach($partenaires as $partenaire)
                <tr>
                    <td class="text-center"><a href="{{  url($partenaire->url) }}"  target="_blank"><img src="{{ asset('storage/commune/partenaires/'.$partenaire->logo) }}" class="css-class" alt="alt text" width="105px"></a></td>

                    <td>{{ $partenaire->nom }}</td>

                    <td>{{ $partenaire->type_partenaire }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('partenaires.edit', $partenaire) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('partenaires.destroy', $partenaire))) !!}
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

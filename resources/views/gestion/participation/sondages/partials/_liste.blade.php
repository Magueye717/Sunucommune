<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Illustration</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Thématique</th>
            <th>Options</th>
            <th>Ajouté par</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($sondages)
            @foreach($sondages as $sondage)
                <tr>
                    <td class="text-center"><img src="{{ asset('storage/participation/sondage/photos/'.$sondage->photo) }}" class="css-class" alt="alt text" width="105px"></td>

                    <td>{{ $sondage->titre }}</td>
                    <td>{{ $sondage->description }}</td>
                    <td>{{ $sondage->thematique->libelle }}</td>
{{--                    <td>{{ $sondage->sondage_options_id }}</td>--}}
                    <td>
                        @foreach($sondage->sondageOptions as $option)
                          <span class="label label-info" style="margin: 2px;  display:block;
   float:left; ">  {{$option->libelle}} </span>
                        @endforeach
                    </td>
                    <td>{{ $sondage->ajouterPar->prenom.' '.$sondage->ajouterPar->nom }}</td>

                    <td class="text-nowrap text-center">
                        {!! Form::open(array(
                                    'method' => 'PUT',
                                    'class' => 'sunucommune-form',
                                    'style' => 'display: inline;',
                                    'route' => array('sondages.publication', $sondage))) !!}
                        {{ csrf_field() }}
                        @if($sondage->estPublie())
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


                        <a href="{{ route('sondages.edit', $sondage) }}" class="text-inverse p-r-10"
                           data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('sondages.destroy', $sondage))) !!}
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

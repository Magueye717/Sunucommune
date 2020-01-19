<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Photo</th>
            <th>Question</th>
            <th>Thematique</th>
            <th>date de publication</th>
            <th>status</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($panels)
            @foreach($panels as $panel)
                <tr>
                    <td class="text-center">
                        <img src="{{ !empty($panel->photo) ? asset('storage/participation/panels/' .$panel->photo) : asset('themev1/images/default.png')}}"
                             alt="photo" class="img-thumbnail table-photo">
                    </td>
                    <td>{{ $panel->question }}</td>
                    <td><span class="label label-info">{{ $panel->thematique->libelle}}</span></td>
                    <td>{{ $panel->date_publication }}</td>
                    <td class="text-center">
                        @if($panel->estActive())
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Desactive</span>
                        @endif
                    </td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('panels.show', $panel) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Voir commentaires">
                            <i class="ti-info-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'PUT',
                            'class' => 'sunucommune-form',
                            'style' => 'display: inline;',
                            'route' => array('panels.valider', $panel))) !!}
                        {{ csrf_field() }}
                        @if($panel->estActive())
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
                        <a href="{{ route('panels.edit', $panel) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('panels.destroy', $panel))) !!}
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

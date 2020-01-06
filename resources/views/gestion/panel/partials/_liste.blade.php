<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Question</th>
            <th>date de publication</th>
            <th>status</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($panels)
            @foreach($panels as $panel)
                <tr>
                    <td>{{ $panel->question }}</td>
                    <td>{{ $panel->date_publication }}</td>
                    <td>{!! Form::checkbox('status', $panel, null, ['id' => 'status','class' => 'form-control']) !!}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('panels.show', $panel) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>
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

<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>commune</th>
            <th>Rôles</th>
            <th>Date d'ajout</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($users)
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ !empty($user->commune) ? $user->commune->nom : "non renseigner" }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="label label-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('users.show', $user) }}" class="text-inverse p-r-10" title="Détail">
                            <i class="ti-info-alt"></i><span class="btn btn-primary">Details</span>
                        </a>
                        <a href="{{ route('users.edit', $user) }}" class="text-inverse p-r-10" title="Modifier">
                            <i class="ti-marker-alt"></i><span class="btn btn-primary">Edit</span>
                        </a>
                        {!! Form::open(array(
                                        'method' => 'DELETE',
                                        'class' => 'delete-form',
                                        'style' => 'display: inline;',
                                        'route' => array('users.destroy', $user))) !!}
                        {{ csrf_field() }}
                        <a href="#delete" class="text-danger padess-delete" title="Supprimer">
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

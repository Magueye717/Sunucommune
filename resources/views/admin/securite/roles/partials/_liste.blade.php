<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Permissions</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($roles)
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        @foreach($role->permissions as $perm)
                            <span class="label label-primary">{{ $perm->name }}</span>
                        @endforeach
                    </td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('roles.edit', $role) }}" class="text-inverse p-r-10" title="Modifier">
                            <i class="ti-marker-alt"></i> <span class="btn btn-primary">Edit</span>
                        </a>

                    </td>


                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
</div>

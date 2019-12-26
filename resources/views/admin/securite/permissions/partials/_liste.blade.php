<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($permissions)
            @foreach($permissions as $perm)
                <tr>
                    <td>{{ $perm->name }}</td>
                    <td>{{ $perm->description }}</td>
                    <td class="text-nowrap text-center">
                        <a href="{{ route('permissions.edit', $perm) }}" class="text-inverse p-r-10" title="Modifier">
                            <i class="ti-marker-alt"></i> <span class="btn btn-primary">Edit</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
</div>
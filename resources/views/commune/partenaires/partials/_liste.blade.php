<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
{{--            <th>Permissions</th>--}}
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($partenaires)
            @foreach($partenaires as $partenaire)
                <tr>
                    <td>{{ $partenaire->nom }}</td>
                    <td>{{ $partenaire->type_partenaire }}</td>
{{--                    <td>{{ $partenaire->nom }}</td>--}}


                    <td>
                        <a href="{{ route('partenaires.edit', $partenaire) }}" class="text-inverse p-r-10" data-toggle="tooltip">edit</a>

                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>
</div>

.<div class="container-fluid">
    

<div class="table">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Quartier/village</th>
            <th>Secteur</th>
            <th>Nom</th>
            <th>Heure ouverture</th>
            <th>Heure fermeture</th>
            <th>Personne responsable</th>
            <th>Adresse</th>
            <th>Statut</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($ressources)
            @foreach($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->collectivite->nom }}</td>
                    <td>{{ $ressource->secteur->nom }}</td>
                    <td>{{ $ressource->nom }}</td>
                    <td>{{ $ressource->heure_ouverture }}</td>
                    <td>{{ $ressource->heure_fermeture }}</td>
                    <td>{{ $ressource->personne_contact }}</td>
                    <td>{{ $ressource->adresse }}</td>
                    <td>@if($ressource->statut===1)
                        <span class="label label-success">Publié</span>
                    @else
                        <span class="label label-danger">Non publié</span>
                    @endif</td>
                    <td class="text-nowrap text-center">
                    {{-- <a href="" data-toggle="modal" data-target="#membreModalLong" class="text-inverse p-r-10" data-toggle="tooltip"
                        onclick="$('#cadre_id').val('{{$cadre->id}}');"
                          title="Ajouter membre">
                            <i class="ti-plus"></i>
                        </a> --}}
                        <a href="{{ route('ressources.edit', $ressource) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        <a href="{{ route('ressources.show', $ressource) }}" class="text-inverse p-r-5"
                            data-toggle="tooltip" title="Détail">
                            <i class="ti-info-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'delete-form',
                            'style' => 'display: inline;',
                            'route' => array('ressources.destroy', $ressource))) !!}
                            {{ csrf_field() }}
                            <a href="#delete" class="text-danger sunucommune-delete" data-toggle="tooltip" title="Supprimer">
                                <i class="ti-trash"></i>
                            </a>
                        {!! Form::close() !!}
                    </td>
                </tr>
                {{-- {{ Form::hidden('cadre_id', $cadre->id) }} --}}
            @endforeach
        @endisset
        </tbody>
    </table>
</div>


        @include('gestion.participation.membre_cadre.partials._modal_form')
        <script>
            $(function () {
                'use strict';
                // Select2
                $('.select2').select2();

                //Gestion collectivite
                $('.dynamic').change(function () {
                    if ($(this).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dependent = $(this).data('dependent');
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: "{{ route('collectivites.fetch') }}",
                            type: "POST",
                            data: {select: select, value: value, _token: _token, dependent: dependent},
                            success: function (result) {
                                $('#' + dependent).html(result);
                            }
                        })

                    }
                });
                $('#region').change(function () {
                    $('#departement').val('').trigger("change");
                    $('#commune').val('').trigger("change").empty();
                    $('#quartiervillage').val('').trigger("change").empty();
                });
                $('#departement').change(function () {
                    $('#commune').val('').trigger("change");
                    $('#quartiervillage').val('').trigger("change").empty();
                });
                $('#commune').change(function () {
                    $('#quartiervillage').val('').trigger("change")
                });
            });
        </script>


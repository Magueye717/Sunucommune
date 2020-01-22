<div class="table">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Collectivité</th>
            <th>Date création</th>
            <th>Fichier</th>
            <th>Ajouté par:</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($cadres)
            @foreach($cadres as $cadre)
                <tr>
                    <td>{{ $cadre->nom }}</td>
                    <td>{{ $cadre->collectivite->nom }}</td>
                    <td>{{ $cadre->date_creation }}</td>
                    <td>{{ $cadre->fichier }}</td>
                    <td>{{ $cadre->ajouterPar->nom }}</td>
                    <td class="text-nowrap text-center">
                    <a href="" data-toggle="modal" data-target="#membreModalLong" class="text-inverse p-r-10" data-toggle="tooltip"
                        onclick="$('#cadre_id').val('{{$cadre->id}}');"
                          title="Ajouter membre">
                            <i class="ti-plus"></i>
                        </a>
                        <a href="{{ route('cadres.edit', $cadre) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'sunucommune-delete',
                            'style' => 'display: inline;',
                            'route' => array('cadres.destroy', $cadre->id))) !!}
                         {{ csrf_field() }}
                        <a href="#delete" class="text-danger padess-delete" data-toggle="tooltip" title="Supprimer">
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


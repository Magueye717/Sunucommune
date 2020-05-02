<div class="table">
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Quatiés(s) / Village(s)</th>
            <th>Date création</th>
            <th>Fichier</th>
            <th>status</th>
            <th>Ajouté par:</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @isset($cadres)
            @foreach($cadres as $cadre)
                <tr>
                    <td>{{ $cadre->nom }}</td>
                    <td>
                        @foreach ($cadre->collectivites as $collectivite)
                        <span class="badge badge-pill badge-info">{{ $collectivite->nom }}</span>
                        @endforeach
                    </td>
                    <td>{{ $cadre->date_creation }}</td>
                    <td><img src="{{ isset($cadre->photo) ? asset('storage/participation/comites/' .$cadre->photo) : asset('themev1/images/default.png')}}"
                        alt="photo" class="img-thumbnail table-photo">
                    </td>
                    <td class="text-center">
                        @if($cadre->estActive())
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Desactive</span>
                        @endif
                    </td>
                    <td>{{ $cadre->ajouterPar->nom }}</td>
                    <td class="text-nowrap text-center">
                    <a href="" data-toggle="modal" data-target="#membreModalLong" class="text-inverse p-r-10" data-toggle="tooltip"
                        onclick="$('#cadre_id').val('{{$cadre->id}}');"
                          title="Ajouter membre">
                            <i class="ti-plus"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'PUT',
                            'class' => 'sunucommune-form',
                            'style' => 'display: inline;',
                            'route' => array('cadres.valider', $cadre))) !!}
                        {{ csrf_field() }}
                        @if($cadre->estActive())
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
                        <a href="{{ route('cadres.edit', $cadre) }}" class="text-inverse p-r-10" data-toggle="tooltip"
                           title="Modifier">
                            <i class="ti-marker-alt"></i>
                        </a>
                        {!! Form::open(array(
                            'method' => 'DELETE',
                            'class' => 'delete-form',
                            'style' => 'display: inline;',
                            'route' => array('cadres.destroy', $cadre))) !!}
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


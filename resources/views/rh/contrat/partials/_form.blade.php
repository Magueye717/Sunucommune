    <div>
        <div class="row">
            <div class="form-group col-md-4">
                <label class="control-label">Nom du contrat: <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Libelle du contrat']) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group col-md-4">
                <label class="control-label">Type de contrat <span class="text-danger">*</span></label>
                {!! Form::select('type_contrat', $typeContrat, null, ['id' => 'type_contrat', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Choisir...']) !!}
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">Agent <span class="text-danger">*</span></label>
                {!! Form::select('agent_id', $agents, null, ['id' => 'agent_id', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Choisir...']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label class="control-label">Date début: <span class="text-danger">*</span></label>
                {!! Form::text('date_debut', null, ['id' => 'date_debut', 'class' => 'form-control mydatepicker', 'required' => '','placeholder' => 'DD/MM/YYYY']) !!}
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group col-md-4">
                <label class="control-label">Date fin: <span class="text-danger">*</span></label>
                {!! Form::text('date_fin', null, ['id' => 'date_fin', 'class' => 'form-control mydatepicker', 'required' => '', 'placeholder' => 'DD/MM/YYYY']) !!}
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-4">
                <label class="control-label">statut <span class="text-danger">*</span></label>
                {!! Form::select('statut', $statuContrat, null, ['id' => 'statut', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Choisir...']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                  <label class="form-check-label    "> Congé  <span class="text-danger">*</span></label>
                    {!! Form::checkbox('conge', '1', 1,  ['id' => 'conge','class'=>'form-check-input']) !!}
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!--/row-->
<div class="form-actions text-center">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@push('myJS')
<script>
    $(function () {
        'use strict';
        // Select2
        $('.select2').select2();

        jQuery('.mydatepicker').datepicker({
                format: 'yyyy/mm/dd',
                language: 'fr',
                todayHighlight: true,
                endDate: '+2d'
            });

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
@endpush
@section('stylesAdditionnels')
    @parent
@endsection

@section('scriptsAdditionnels')
    @parent
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

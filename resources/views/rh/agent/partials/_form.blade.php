<div class=" "  >

    <div class="row ">
{{--        <div class="col-md-4"  >Photo</div>--}}
        <div class="col-md-6"  >
            <div class="form-group mb-0">
                <label class="control-label">Photo</label>
                {!! Form::file('avatar', ['id' => 'avatar', 'class' => 'form-control', 'placeholder'=>'Choisir le avatar']) !!}
                <span class="help-block"><small>La avatar doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
{{--                @if(isset($agent) && !empty($agent->avatar))--}}
{{--                    <img class="avatar-min" src="{{ asset('storage/rh/agents/'. $agent->avatar) }}" alt="avatar"--}}
{{--                         title="Logo"/>--}}
{{--                @endif--}}
            </div>
        </div>
                <div class="col-md-4"  >

                    @if(isset($agent) && !empty($agent->avatar))
                        <img class="pull-right" src="{{ asset('storage/rh/agents/'. $agent->avatar) }}" alt="avatar" width="100px"
                             title="Logo" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border: 6px solid #ffffff;"/>
                    @endif
                </div>

    </div>
    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Prénom: <span class="text-danger">*</span></label>
                {!! Form::text('prenom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nom: <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Adresse <span class="text-danger">*</span></label>
                {!! Form::text('adresse', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Adresse']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Téléphone: <span class="text-danger">*</span></label>
                {!! Form::text('telephone', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Tel']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Email: <span class="text-danger">*</span></label>
                {!! Form::text('email', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Email']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Fonction: <span class="text-danger">*</span></label>
                {!! Form::text('fonction', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Fonction']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <div class="row">


        <div class="col-md-6">

            <div class="form-check">
{{--            <div class="form-group">--}}
{{--                <label class="control-label">Statut <span class="text-danger">*</span></label>--}}
{{--                {!! Form::text('statut_cadre',null, ['id' => 'date_creation', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Statut du cadres']) !!}--}}
{{--                <div class="help-block with-errors"></div>--}}


              <label class="form-check-label    "> Statut  <span class="text-danger">*</span></label>
                {!! Form::checkbox('statut_agent', '1', 1,  ['id' => 'name','class'=>'form-check-input']) !!}

                <div class="help-block with-errors"></div>

            </div>
        </div>
    </div>
</div>
<!--/row-->

</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@push('myJS')
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

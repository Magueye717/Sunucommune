
<div class="" align="center">
    <div class="row">
        <div class="col-md-6">

                <div class="form-group">
                    <label class="control-label">Cadre de concertation <span class="text-danger">*</span></label>
                    {!! Form::select('cadre_de_concertation_id', $cadreConcertations, isset($infoLocalisation) ? $infoLocalisation['region'] : null, ['id' => 'region', 'class' => 'form-control select2 dynamic', 'data-dependent' => 'departement']) !!}
                </div>
            </div>
            <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Prénom: <span class="text-danger">*</span></label>
                {!! Form::text('prenom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nom: <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Adresse <span class="text-danger">*</span></label>
                {!! Form::text('adresse', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Adresse']) !!}
                <div class="help-block with-errors"></div>
            </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Téléphone: <span class="text-danger">*</span></label>
                {!! Form::text('telephone', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Tel']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
            <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Email: <span class="text-danger">*</span></label>
                {!! Form::text('email', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Email']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
        <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Fonction: <span class="text-danger">*</span></label>
                {!! Form::text('fonction', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Fonction']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Photo</label>
                {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($cadre) && !empty($cadre->fichier))
                    <img class="avatar-min" src="{{ asset('storage/participation/comites/'. $cadre->photo) }}" alt="avatar"
                        title="Photo du membre"/>
                @endif
            </div>
        </div>
    </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Annuler</button>
    </div>
    <!--/row-->

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

<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">cadre de concertation<span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Quartier / Village  <span class="text-danger">*</span></label>
                {!! Form::select('collectivite_id', $collectivites ,null, ['id' => 'collectivite', 'class' => 'form-control select2 dynamic', 'required' => '']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Date création <span class="text-danger">*</span></label>
                {!! Form::text('date_creation', null, ['id' => 'date_creation', 'class' => 'form-control mydatepicker', 'required' => '', 'placeholder' => 'jj/mm/aaaa']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Photo</label>
                {!! Form::file('fichier', ['id' => 'fichier', 'class' => 'form-control', 'placeholder'=>'Choisir la photo']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($cadre) && !empty($cadre->fichier))
                    <img class="avatar-min" src="{{ asset('storage/commune/membres/'. $cadre->fichier) }}" alt="avatar"
                        title="Photo du membre"/>
                @endif
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

        jQuery('.mydatepicker').datepicker({
                format: 'yyyy/mm/dd',
                language: 'fr',
                todayHighlight: true,
                endDate: '+2d'
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

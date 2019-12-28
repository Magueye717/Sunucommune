<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Prénom <span class="text-danger">*</span></label>
                {!! Form::text('prenom', null, ['id' => 'prenom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nom <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Fonction <span class="text-danger">*</span></label>
                {!! Form::text('fonction', null, ['id' => 'fonction', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Fonction']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Adresse </label>
                {!! Form::text('adresse', null, ['id' => 'adresse', 'class' => 'form-control', 'placeholder' => 'Adresse']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Téléphone </label>
                {!! Form::text('telephone', null, ['id' => 'telephone', 'class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($membre))
        {!! Form::hidden('membre_cabinet_id', $membre->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

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

<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Partenaire <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Partenaire']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Type Partenariat <span class="text-danger">*</span></label>
                {!! Form::select('type_partenaire', $type, null, ['id' => 'type_partenaire', 'class' => 'form-control',
                    'required' => '', 'placeholder' => 'Choisir...']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Logo</label>
                {!! Form::file('logo', null, ['id' => 'logo', 'class' => 'form-control', 'placeholder' => 'Logo']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Site Web</label>
                {!! Form::text('url', null, ['id' => 'url', 'class' => 'form-control', 'placeholder' => 'Site Web']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($partenaire))
        {!! Form::hidden('partenaire_id', $partenaire->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@push('myJS')
@endpush

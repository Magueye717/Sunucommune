<div class="form-body">
    <div class="row m-b-20 m-t-15">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Adresse</label>
                {!! Form::text('adresse', null, ['id' => 'adresse', 'class' => 'form-control']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Enregistrer</button>
        <a href="{{ url()->previous() }}" class="btn btn-default">Annuler</a>
    </div>
</div>

@section('stylesAdditionnels')
    @parent
@endsection

@section('scriptsAdditionnels')
    @parent
    <!-- Validator -->
    <script src="{{ asset('themev3/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

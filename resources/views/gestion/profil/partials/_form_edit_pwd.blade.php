<div class="form-body">
    <div class="row m-b-20 m-t-15">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Mot de passe actuel: <span class="tx-danger">*</span></label>
                <input type="password" id="actuel-password" name="actuel_password" minlength="6"
                       class="form-control{{ $errors->has('actuel_password') ? ' is-invalid' : '' }}"
                       value="{{ old('actuel_password') }}" required autofocus
                       placeholder="Entrez votre mot de passe actuel">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nouveau mot de passe: <span class="tx-danger">*</span></label>
                <input type="password" id="nouveau-password" name="nouveau_password" minlength="6"
                       class="form-control{{ $errors->has('nouveau_password') ? ' is-invalid' : '' }}"
                       value="{{ old('nouveau_password') }}" required autofocus
                       placeholder="Entrez votre nouveau mot de passe">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Confirmation mot de passe: <span class="tx-danger">*</span></label>
                <input type="password" id="password-confirm" name="nouveau_password_confirmation" minlength="6"
                       class="form-control{{ $errors->has('nouveau_password_confirmation') ? ' is-invalid' : '' }}"
                       value="{{ old('nouveau_password_confirmation') }}" required autofocus
                       placeholder="Confirmez nouveau mot de passe">
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
@endsection

@section('scriptsAdditionnels')
    <!-- Validator -->
    <script src="{{ asset('themev3/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

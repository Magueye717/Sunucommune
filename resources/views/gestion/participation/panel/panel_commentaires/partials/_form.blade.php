<div class="form-body">
    <div class="row">
        <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Nom <span class="text-danger">*</span></label>
                    {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'placeholder' => 'Nom']) !!}
                    <div class="help-block with-errors"></div>
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Email <span class="text-danger">*</span></label>
                {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Adresse email']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Panel <span class="text-danger">*</span></label>
                {!! Form::select('panel_id', $panels, null, ['id' => 'question','class' => 'form-control','placeholder' => 'Choisir...']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Commentaire <span class="text-danger">*</span></label>
                    {!! Form::textarea('commentaire', null, ['id' => 'commentaire', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Redigez votre commentaire.........']) !!}
                    <div class="help-block with-errors"></div>
                </div>
        </div>

    </div>
    <!--/row-->

    @if(isset($panel))
        {!! Form::hidden('panel_id', $panel->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@section('stylesAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.style')
    @include('layouts.v1.partials.datepicker.style')

@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.script')
    @include('layouts.v1.partials.datepicker.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

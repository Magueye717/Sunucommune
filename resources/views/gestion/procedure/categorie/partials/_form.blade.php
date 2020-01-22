<div class="form-body">
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label class="control-label">libelle <span class="text-danger">*</span></label>
                {!! Form::text('libelle', null, ['id' => 'libelle', 'class' => 'form-control', 'required' => '', 'placeholder' => 'libelle']) !!}
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label class="control-label">Description</label>
                {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Ajouter une description pour le theme']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($thematique))
        {!! Form::hidden('thematique_id', $thematique->id) !!}
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

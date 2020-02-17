<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Titre <span class="text-danger">*</span></label>
                {!! Form::text('titre', null, ['id' => 'titre', 'class' => 'form-control', 'required' => '', 'placeholder' => 'titre ??']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Categorie <span class="text-danger">*</span></label>
                {!! Form::select('categorie_id', $categories, null, ['id' => 'categorie_id', 'class' => 'form-control select2', 'placeholder' => 'Choisir...', 'required' => '']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Lieu de depot <span class="text-danger">*</span></label>
                {!! Form::text('lieu_depot', null, ['id' => 'lieu_depot', 'class' => 'form-control', 'placeholder' => 'lieu de depot ??']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Cout <span class="text-danger">*</span></label>
                {!! Form::number('couts', null, ['id' => 'couts', 'class' => 'form-control','step'=>'any', 'placeholder' => 'cout procedure??']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Description</label>
                {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control summernote']) !!}
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
    @include('layouts.v1.partials.summernote.style')

@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.script')
    @include('layouts.v1.partials.datepicker.script')
    @include('layouts.v1.partials.summernote.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
    <script>
        $(function () {
            'use strict';
            // Select2
            $('.select2').select2();
            // Date Picker
            jQuery('.mydatepicker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'fr',
                todayHighlight: true,
                endDate: '+2d'
            });
            //Summernote
            $('.summernote').summernote({
                placeholder: 'Ajouter la descripttion...',
                tabsize: 2,
                minHeight: 150,
                lang: 'fr-FR'
            });
        });
    </script>
@endpush

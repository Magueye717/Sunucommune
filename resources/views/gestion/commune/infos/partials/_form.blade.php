<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Maire <span class="text-danger">*</span></label>
                {!! Form::text('maire', null, ['id' => 'maire', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom & Nom du Maire']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Date de création</label>
                <div class="input-group">
                    {!! Form::text('date_creation', null, ['id'=>'date_creation',
                    'class'=>'form-control mydatepicker', 'placeholder'=>'jj/mm/aaaa', 'autocomplete'=>'off']) !!}
                    <span class="input-group-addon"><i class="icon-calender"></i></span>
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Superficie</label>
                <div class="input-group">
                    {!! Form::text('superficie', null, ['id' => 'superficie', 'class' => 'form-control', 'placeholder' => 'Superficie']) !!}
                    <span class="input-group-addon">En m²</span>
                </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Population</label>
                {!! Form::text('population', null, ['id' => 'population', 'class' => 'form-control', 'placeholder' => 'Population']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Délimitation</label>
                {!! Form::text('delimitation', null, ['id' => 'delimitation', 'class' => 'form-control', 'placeholder' => 'Délimitation']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Photo du maire</label>
                {!! Form::file('photo_maire', ['id' => 'photo_maire', 'class' => 'form-control', 'placeholder'=>'Choisir la photo du maire']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($communeInfo) && !empty($communeInfo->photo_maire))
                    <img class="avatar-min" src="{{ asset('storage/commune/photos/'. $communeInfo->photo_maire) }}" alt="avatar"
                         title="Photo du maire"/>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Mot du maire</label>
                {!! Form::textarea('mot_du_maire', null, ['id' => 'mot_du_maire', 'class' => 'form-control summernote']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($communeInfo))
        {!! Form::hidden('commune_info_id', $communeInfo->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@section('stylesAdditionnels')
    @parent
    @include('layouts.v1.partials.datepicker.style')
    @include('layouts.v1.partials.custom-select.style')
    @include('layouts.v1.partials.summernote.style')
@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.datepicker.script')
    @include('layouts.v1.partials.custom-select.script')
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
                placeholder: 'Ajouter le mot du maire...',
                tabsize: 2,
                minHeight: 150,
                lang: 'fr-FR'
            });
        });
    </script>
@endpush
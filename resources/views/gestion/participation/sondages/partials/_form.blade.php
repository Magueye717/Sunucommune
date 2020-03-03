
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Illustration</label>
                {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>"Choisir l'ilustration "]) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($sondage) && !empty($sondage->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/photos/'. $sondage->photo) }}" alt="avatar"
                         title="Logo"/>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Titre <span class="text-danger">*</span></label>
                {!! Form::text('titre', null, ['id' => 'titre', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Titre']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Thématique </label>
                {!! Form::select('thematique_id', $thematiques, null, ['id' => 'thematique', 'class' => 'form-control','required' => ''/*, 'placeholder' => 'Choisir...'*/]) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>


{{--        <div class="col-md-6  ">--}}

{{--            <div class="form-group">--}}
{{--                <label class="control-label">zsjdjjss </label>--}}

{{--                <imput type="text" name="libelled" value="{{old('libelle') ? : $sondage->libelle}}"></imput>--}}
{{--                <div class="help-block with-errors"></div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-md-6  ">

            <div class="form-group">
                <label class="control-label">Options </label>
                {!! Form::text('libelle',null, ['id' => 'tokenfield', 'class' => 'form-control', 'placeholder' => 'Options','multiple','value'=>'{{old(libelle)? : $options->libelle}}']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Description</label>
                {!! Form::textarea('description',null, ['id' => 'description', 'class' => 'form-control summernote', 'placeholder' => 'Description']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

    </div>
    <!--/row-->

    @if(isset($sondage))
        {!! Form::hidden('sondage_id', $sondage->id) !!}
        {{ Form::hidden('options_id', null, array('id' => 'options_id')) }}
{{--        {{ Form::hidden('options_id', null) ,['id' => 'options_id', 'class' => 'options_id']}}--}}

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

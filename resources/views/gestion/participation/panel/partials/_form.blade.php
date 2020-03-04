<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Question <span class="text-danger">*</span></label>
                {!! Form::text('question', null, ['id' => 'question', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Question ??']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Thematique <span class="text-danger">*</span></label>
                {!! Form::select('thematique_id', $thematiques, null, ['id' => 'thematique_id', 'class' => 'form-control select2', 'placeholder' => 'Choisir...', 'required' => '']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Photo d'illustration</label>
                {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo d\'illustration']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 150x150 et max: 1600x1600.</small></span>
                @if(isset($panel) && !empty($panel->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/articles/photos/'. $article->photo) }}" alt="photo" title="Photo"/>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Piéce-jointe</label>
                {!! Form::file('fichier', ['id' => 'fichier', 'class' => 'form-control', 'placeholder'=>'Choisir une piéce-jointe']) !!}
                <span class="help-block"><small>Le fichier doit être au format pdf, docx ou xlsx et doit peser au maximum 10Mo.</small></span>
                @if(isset($panel) && !empty($panel->fichier))
                    <a href="{{ asset('storage/partiicipation/panel/files/'. $panel->fichier) }}" target="_blank"> {{ $panel->fichier }} </a>
                @endif
            </div>
        </div>
        <div class="col-md-12">
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

<div class="form-body">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="form-group">
                <label class="control-label">Titre <span class="text-danger">*</span></label>
                {!! Form::text('titre', null, ['id' => 'titre', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Titre de l\'article']) !!}
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label class="control-label">Type d'article <span class="text-danger">*</span></label>
                {!! Form::select('type_article_id', $types, null, ['id' => 'type_article_id', 'class' => 'form-control select2', 'placeholder' => 'Choisir...', 'required' => '']) !!}
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group mb-0">
                <label class="control-label">Photo d'illustration</label>
                {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo d\'illustration']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 150x150 et max: 1600x1600.</small></span>
                @if(isset($article) && !empty($article->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/articles/photos/'. $article->photo) }}" alt="photo" title="Photo"/>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">Texte</label>
                {!! Form::textarea('texte', null, ['id' => 'texte', 'class' => 'form-control summernote']) !!}
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group mb-0">
                <label class="control-label">Piéce-jointe</label>
                {!! Form::file('piece_jointe', ['id' => 'piece_jointe', 'class' => 'form-control', 'placeholder'=>'Choisir une piéce-jointe']) !!}
                <span class="help-block"><small>Le fichier doit être au format pdf, docx ou xlsx et doit peser au maximum 10Mo.</small></span>
                @if(isset($article) && !empty($article->piece_jointe))
                    <a href="{{ asset('storage/commune/articles/files/'. $article->piece_jointe) }}" target="_blank"> {{ $article->piece_jointe }} </a>
                @endif
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($article))
        {!! Form::hidden('article_id', $article->id) !!}
    @endif
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
                <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
            </div>
        </div>
    </div>
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
                placeholder: 'Ajouter la descripttion...',
                tabsize: 2,
                minHeight: 150,
                lang: 'fr-FR'
            });
        });
    </script>
@endpush

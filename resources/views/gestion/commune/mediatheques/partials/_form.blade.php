<div class="form-body">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
                {{-- <div class="form-group">
                    <label class="control-label">Type de média</label>
                    {!! Form::select('type_media', $typeMedia, isset($media->type_fichier) ? $media->type_fichier : null, ['id' => 'type_media', 'class' =>
                    'form-control select2', 'required' => '', 'placeholder' => 'Choisir...']) !!}
                </div> --}}
            <div class="form-group mb-0">
                <label class="control-label">Upload Média</label>
                {!! Form::file('fichier', ['id' => 'fichier', 'class' => 'form-control', 'placeholder'=>'Choisir la photo d\'illustration']) !!}
                {{-- <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 150x150 et max: 1600x1600.</small></span> --}}
                @if(isset($media) && !empty($media->fichier))
                    <img class="avatar-min" src="{{ asset('storage/commune/mediatheques/'. $media->fichier) }}" alt="média" title="média"/>
                @endif
            </div>

            <div class="form-group">
                <label class="control-label">Rubrique</label>
                {!!  Form::select('rubrique', ['gallerie' => 'Gallerie', 'slide' => 'Slide'],  null, ['class' => 'form-control', 'placeholder'=>'Choisir une rubrique' ]) !!}
                <div class="help-block with-errors"></div>
            </div>
           
            <div class="form-group">
                <label class="control-label">Texte</label>
                {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control summernote']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <!--/row-->
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
           /*  jQuery('.mydatepicker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'fr',
                todayHighlight: true,
                endDate: '+2d'
            }); */
            //Summernote
            $('#description').summernote({
                placeholder: 'Ajouter la descripttion...',
                tabsize: 2,
                minHeight: 150,
                lang: 'fr-FR'
            });
        });
    </script>
@endpush

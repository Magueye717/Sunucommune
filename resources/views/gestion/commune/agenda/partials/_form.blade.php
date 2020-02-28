<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Titre de l'actévite<span class="text-danger">*</span></label>
                {!! Form::text('libelle', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Titre']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Quartier / Village  <span class="text-danger">*</span></label>
                {!! Form::select('collectivite_id', $collectivites ,null, ['id' => 'collectivite', 'class' => 'form-control select2 dynamic', 'required' => '']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Lieu<span class="text-danger">*</span></label>
                {!! Form::text('lieu', null, ['id' => 'lieu', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Lieu de l\'activité']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Date de l'activité <span class="text-danger">*</span></label>
                {!! Form::text('date_evenement', null, ['id' => 'date_creation', 'class' => 'form-control mydatepicker', 'required' => '', 'placeholder' => 'jj/mm/aaaa']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-0">
                <label class="control-label">Photo</label>
                {!! Form::file('photo', ['id' => 'fichier', 'class' => 'form-control', 'placeholder'=>'Choisir la photo']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($agenda) && !empty($agenda->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/agenda/files/'. $agenda->photo) }}" alt="phot-agenda"
                        title="Photo de l'activité"/>
                @endif
            </div>
        </div>
        
    </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Description de l'activité</label>
                {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control summernote']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    <!--/row-->

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
                format: 'yyyy/mm/dd',
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


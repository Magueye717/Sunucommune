<div class="form-body">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Quartier / Village  <span class="text-danger">*</span></label>
                {!! Form::select('collectivite_id', $collectivites ,null, ['id' => 'collectivite', 'class' => 'form-control select2', 'placeholder'=>'Choisir un quartier ou un village',]) !!}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Secteur de l'infrastructure  <span class="text-danger">*</span></label>
                {!! Form::select('secteur_id', $secteurs ,null, ['id' => 'secteur', 'class' => 'form-control select2', 'placeholder'=>'Choisir le secteur', 'required',]) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-0">
                <label class="control-label">Photo</label>
                {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($ressource) && !empty($ressource->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/infrastructures/files/'. $ressource->photo) }}" alt="phot-structure"
                        title="Photo de l'activité"/>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">Nom de structure<span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom de la structure']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Heure d'ouverture <span class="text-danger">*</span></label>
                {{-- {!! Form::text('heure_ouverture',null, ['id' => 'heure_ouverture', 'class' => 'form-control clockpicker', 'required' => '', 'placeholder' => '00H : 00']) !!} --}}
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-time"></div>
                    <input type="text" name="heure_ouverture" class="form-control clockpicker" id="heure_ouverture" placeholder="00h : 00">
                  </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Heure fermeture<span class="text-danger">*</span></label>
                {{-- {!! Form::text('heure_fermeture', null, ['id' => 'heure_fermeture', 'class' => 'form-control clockpicker', 'required' => '', 'placeholder' => '00H : 00']) !!} --}}
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-time"></div>
                    <input type="text" name="heure_fermeture" class="form-control clockpicker" id="heure_fermeture" placeholder="00h : 00">
                  </div>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Contact personne responsable<span class="text-danger">*</span></label>
                {!! Form::text('personne_contact', null, ['id' => 'personne_contact', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Personne responsable de la structure']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Logitude <span class="text-danger">*</span></label>
                {!! Form::text('longitude', null, ['id' => 'longitude', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Cordonnée logitude']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Latitude<span class="text-danger">*</span></label>
                {!! Form::text('latittude', null, ['id' => 'latittude', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Coordonnée latitude']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Altitude<span class="text-danger">*</span></label>
                {!! Form::text('altitude', null, ['id' => 'altitude', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Coordonnée altitude']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Adresse <span class="text-danger">*</span></label>
                {!! Form::text('adresse', null, ['id' => 'adresse', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Adresse']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Email<span class="text-danger">*</span></label>
                {!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => '', 'placeholder' => 'email']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Tel <span class="text-danger">*</span></label>
                {!! Form::text('telephone', null, ['id' => 'telephone', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Téléphone']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Description<span class="text-danger">*</span></label>
            {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control summernote', 'required' => '']) !!}
            <div class="help-block with-errors"></div>
        </div>
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
    @include('layouts.v1.partials.timepicker.style')
@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.datepicker.script')
    @include('layouts.v1.partials.custom-select.script')
    @include('layouts.v1.partials.summernote.script')
    @include('layouts.v1.partials.timepicker.script')
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

             $('.clockpicker').clockpicker({
                'default': 'now',
                vibrate: true,
                placement: "top",
                align: "left",
                autoclose: true,
                twelvehour: false
            });
        });
    </script>
@endpush





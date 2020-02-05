<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Equipe <span class="text-danger">*</span></label>
                {!! Form::select('equipe_municipale_id',$equipe, null, ['id' => 'equipe_municipale', 'class' => 'form-control', 'required' => '',]) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Prénom <span class="text-danger">*</span></label>
                {!! Form::text('prenom', null, ['id' => 'prenom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nom <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Type hierarchie <span class="text-danger">*</span></label>
                {!! Form::select('hierarchie', $type, null, ['id' => 'hierarchie', 'class' => 'form-control',
                    'required' => '', 'placeholder' => 'Choisir...']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Fonction <span class="text-danger">*</span></label>
                {!! Form::text('fonction', null, ['id' => 'fonction', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Fonction']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Adresse </label>
                {!! Form::text('adresse', null, ['id' => 'adresse', 'class' => 'form-control', 'placeholder' => 'Adresse']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Téléphone </label>
                {!! Form::text('telephone', null, ['id' => 'telephone', 'class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Photo du membre</label>
                {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo du membre']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($membre) && !empty($membre->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/membres/'. $membre->photo) }}" alt="avatar"
                         title="Photo du membre"/>
                @endif
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($membre))
        {!! Form::hidden('membre_cabinet_id', $membre->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@section('stylesAdditionnels')
    @parent
@endsection

@section('scriptsAdditionnels')
    @parent
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
@endpush

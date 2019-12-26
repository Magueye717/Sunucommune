<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Prénom <span class="text-danger">*</span></label>
                {!! Form::text('prenom', null, ['id' => 'prenom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
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
                <label class="control-label">Email <span class="text-danger">*</span></label>
                {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Adresse email']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">commune <span class="text-danger">*</span></label>
                {!! Form::select('commune_id', $communes, null, ['id' => 'commune_id', 'class' => 'form-control select2', 'placeholder' => 'Choisir une commune']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Adresse </label>
                {!! Form::text('adresse', null, ['id' => 'adresse', 'class' => 'form-control', 'placeholder' => 'Nom court']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Rôles <span class="text-danger">*</span></label>
                {!! Form::select('roles[]', $roles, null, ['id' => 'roles', 'class' => 'select2 select2-multiple',
                'multiple' => 'multiple', 'required' => '', 'data-placeholder' => 'Choisir...']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Photo</label>
                <div class="custom-file">
                    {!! Form::file('avatar', ['id' => 'avatar', 'class' => 'custom-file-input', 'placeholder'=>'Choisir une photo']) !!}
                    <label class="custom-file-label" for="avatar">Choisir un fichier</label>
                </div>
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                @if(isset($user) && !empty($user->avatar))
                    <img class="avatar-min" src="{{ asset('storage/images/users/'. $user->avatar) }}" alt="avatar"
                         title="Actuel avatar"/>
                @endif
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($user))
        {!! Form::hidden('user_id', $user->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@section('stylesAdditionnels')
    @parent
@endsection


@push('myJS')
@endpush

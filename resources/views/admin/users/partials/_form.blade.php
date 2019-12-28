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
                {!! Form::file('avatar', ['id' => 'avatar', 'class' => 'form-control', 'placeholder'=>'Choisir une photo']) !!}
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
    @include('layouts.v1.partials.custom-select.style')
@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.custom-select.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
    <script>
        $(function () {
            'use strict';
            // Select2
            $('.select2').select2();
        });
    </script>
@endpush

<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Nom <span class="text-danger">*</span></label>
                {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom',
                    (isset($role)) ? 'readonly' : '']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Descritpion <span class="text-danger">*</span></label>
                {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Description']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Permissions </label>
                {!! Form::select('permissions[]', $permissions, null, ['id' => 'permissions', 'multiple' => 'multiple']) !!}
            </div>
        </div>
    </div>
    <!--/row-->

    @if(isset($role))
        {!! Form::hidden('role_id', $role->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@section('stylesAdditionnels')
    @parent
    <link href="{{ asset('themev1/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scriptsAdditionnels')
    @parent
    <script src="{{ asset('themev1/libs/multiselect/js/jquery.multi-select.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
    <script>
        $(function () {
            'use strict';
            // For multiselect
            $('#permissions').multiSelect();
        });
    </script>
@endpush
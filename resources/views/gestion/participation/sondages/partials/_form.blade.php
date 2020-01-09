
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Titre <span class="text-danger">*</span></label>
                {!! Form::text('titre', null, ['id' => 'titre', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Titre']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Slug </label>
                {!! Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Slug']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Description</label>
                {!! Form::text('description',null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description']) !!}
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

    </div>
    <!--/row-->

    @if(isset($sondage))
        {!! Form::hidden('sondage_id', $sondage->id) !!}
    @endif
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

@push('myJS')

@endpush

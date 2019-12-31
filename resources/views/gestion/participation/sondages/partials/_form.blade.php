
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
                {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        @foreach(range(1,5) as $x)
        <div class="col-md-6">

            <div class="form-group">
                <label class="control-label">Options #{{$x}}</label>
                {!! Form::text('sondage_options[]', null, ['id' => 'sondage_option-{{$x}}', 'class' => 'form-control', 'placeholder' => 'Option {{$x}}','multiple']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        @endforeach
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

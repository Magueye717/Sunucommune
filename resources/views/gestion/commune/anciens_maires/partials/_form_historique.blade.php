<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::textarea('historique', null, ['id' => 'historique', 'class' => 'form-control summernote']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
    </div>
    {!! Form::hidden('commune_info_id', $communeInfo->id) !!}
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary waves-effect text-left">Confirmer</button>
    <button type="button" class="btn btn-secondary waves-effect text-left" data-dismiss="modal">Annuler
    </button>
</div>

@section('stylesAdditionnels')
    @parent
    @include('layouts.v1.partials.summernote.style')
@endsection

@section('scriptsAdditionnels')
    @parent
    @include('layouts.v1.partials.summernote.script')
    <!-- Validator -->
    <script src="{{ asset('themev1/js/validator.js') }}" type="text/javascript"></script>
@endsection

@push('myJS')
    <script>
        $(function () {
            'use strict';
            //Summernote
            $('.summernote').summernote({
                placeholder: 'Ajouter l\'historique de la commune...',
                tabsize: 2,
                minHeight: 150,
                lang: 'fr-FR'
            });
        });
    </script>
@endpush

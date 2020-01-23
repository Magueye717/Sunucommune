<div class="form-body">
    <div class="row">



    <div class="panel panel-default col-12">
        <div class="panel-body">
            <div class="row" style="padding: 0 15px  ">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Prénom <span class="text-danger">*</span></label>
                        {!! Form::text('prenom', null, ['id' => 'prenom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom du Maire']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nom  <span class="text-danger">*</span></label>
                        {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom du Maire']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Date début mandat</label>
                        <div class="input-group">
                            {!! Form::text('date_debut_mandat', null, ['id'=>'date_debut_mandat',
                            'class'=>'form-control mydatepicker', 'placeholder'=>'jj/mm/aaaa', 'autocomplete'=>'off']) !!}
                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Date fin mandat</label>
                        <div class="input-group">
                            {!! Form::text('date_fin_mandat', null, ['id'=>'date_fin_mandat',
                            'class'=>'form-control mydatepicker', 'placeholder'=>'jj/mm/aaaa', 'autocomplete'=>'off']) !!}
                            <span class="input-group-addon"><i class="icon-calender"></i></span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                </div>


{{--                <div class="col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label">Délimitation</label>--}}
{{--                        {!! Form::text('delimitation', null, ['id' => 'delimitation', 'class' => 'form-control', 'placeholder' => 'Délimitation']) !!}--}}
{{--                        <div class="help-block with-errors"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col-md-6">
                    <div class="form-group mb-0">
                        <label class="control-label">Photo du maire</label>
                        {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo du maire']) !!}
                        <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                        @if(isset($ancien_maire) && !empty($ancien_maire->photo))
                            <img class="avatar-min" src="{{ asset('storage/commune/photos/'. $ancien_maire->photo) }}" alt="avatar"
                                 title="Photo du maire"/>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Biographie</label>
                        {!! Form::textarea('biographie', null, ['id' => 'biographie', 'class' => 'form-control summernote']) !!}
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
        </div>
    </div>
</div>
    <!--/row-->

    @if(isset($ancien_maire))
        {!! Form::hidden('photo_maire_id', $ancien_maire->id) !!}
    @endif
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

        //Gestion collectivite
        $('.dynamic').change(function () {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('collectivites.fetch') }}",
                    type: "POST",
                    data: {select: select, value: value, _token: _token, dependent: dependent},
                    success: function (result) {
                        $('#' + dependent).html(result);
                    }
                })
            }
        });



            //Summernote
            $('.summernote').summernote({
                placeholder: 'Ajouter le mot du maire...',
                tabsize: 2,
                minHeight: 150,
                lang: 'fr-FR'
            });

        /* datadependant chaging input */
        $('#region').change(function () {
            $('#departement').val('').trigger("change");
            $('#commune').val('').trigger("change").empty();
            $('#quartiervillage').val('').trigger("change").empty();
        });
        $('#departement').change(function () {
            $('#commune').val('').trigger("change");
            $('#quartiervillage').val('').trigger("change").empty();
        });
        $('#commune').change(function () {
            $('#quartiervillage').val('').trigger("change")
        });
    });
    </script>
@endpush

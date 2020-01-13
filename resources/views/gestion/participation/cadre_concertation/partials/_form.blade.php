<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div >
                <div class="form-group">
                    <label class="control-label">Région <span class="text-danger">*</span></label>
                    {!! Form::select('region', $collectivites, isset($infoLocalisation) ? $infoLocalisation['region'] : null, ['id' => 'region', 'class' => 'form-control select2 dynamic', 'data-dependent' => 'departement']) !!}
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="control-label">Département <span class="text-danger">*</span></label>
                    <select name="departement" id="departement" class="form-control select2 dynamic"
                            data-dependent="commune" required>
                         <option value="">Choisir un département</option>
                         @isset($infoLocalisation)
                         @foreach($infoLocalisation['departements'] as $key=>$value)
                         <option value="{{ $key }}" {{ $key == $infoLocalisation['departement'] ? 'selected' : ''  }}>
                             {{ $value }}
                         </option>
                         @endforeach
                         @endisset
                    </select>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label class="control-label">Commune <span class="text-danger">*</span></label>
                    <select name="commune" id="commune" class="form-control select2 dynamic"
                            data-dependent="quartiervillage" required>
                        <option value="">Choisir un commune</option>
                        @isset($infoLocalisation)
                        @foreach($infoLocalisation['communes'] as $key=>$value)
                        <option value="{{ $key }}" {{ $key == $infoLocalisation['commune'] ? 'selected' : ''  }}>
                            {{ $value }}
                        </option>
                        @endforeach
                        @endisset
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Nom du cadre <span class="text-danger">*</span></label>
                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Date création <span class="text-danger">*</span></label>
                {!! Form::date('date_creation', null, ['id' => 'date_creation', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <label class="control-label">Photo du membre</label>
                {!! Form::file('fichier', ['id' => 'fichier', 'class' => 'form-control', 'placeholder'=>'Choisir la photo']) !!}
                <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                {{-- @if(isset($membre) && !empty($membre->photo))
                    <img class="avatar-min" src="{{ asset('storage/commune/membres/'. $membre->photo) }}" alt="avatar"
                         title="Photo du membre"/>
                @endif --}}
            </div>
        </div>
    </div>
    <!--/row-->

</div>
<div class="form-actions">
    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
    <a href="{{ url()->previous() }}" class="btn btn-default waves-effect waves-light">Annuler</a>
</div>

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


               /* var url= "{{ route('collectivites.fetch') }}"; */


                    /* $.post(url,function(data){
                        alert(data)
                    }) */
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

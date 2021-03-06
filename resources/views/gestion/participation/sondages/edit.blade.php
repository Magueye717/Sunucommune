@extends('layouts.v1.default')

@section('title', 'Gestion des sondages')
@section('pageTitle', 'Gestion des sondages')

@section('filAriane')
    <li class="active">Gestion des Partenaires</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Gestion des Sondages</h3>
                <p class="text-muted m-b-30">Liste des sondages</p>

                {!! Form::model($sondage, ['method' =>'PATCH', 'route' => ['sondages.update',$sondage],
                'role' => 'form', 'class' =>'sunucommune-form', 'data-toggle' => 'validator', 'files' => true]) !!}
                {{--                    @include('gestion.participation.sondage.partials._form')--}}
                @include('gestion.participation.sondages.partials._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection


@section('stylesAdditionnels')
@endsection

@section('scriptsAdditionnels')
@endsection

@push('myJS')

    <script>

        var libelle = "@foreach($sondage->sondageOptions as $option){{$option->libelle}},@endforeach";
        var options_id = "@foreach($sondage->sondageOptions as $option){{$option->id}},@endforeach";
        JSON.stringify(libelle);
        libelle.substring(1, libelle.length - 1);

        JSON.stringify(options_id);
        $('#options_id').val(options_id);

        $('#tokenfield').tokenfield().tokenfield('setTokens', libelle);

    </script>

@endpush

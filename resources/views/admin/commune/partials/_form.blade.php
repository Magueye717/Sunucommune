<div class="panel-block col-md-8 col-lg-offset-2" style="border: black, 5px">
    <div class="panel-heading">Création d'une coemmun</div>
    <div class="panel-body">
            <div>
                <div class="form-group">
                    <label class="control-label">Nom  <span class="text-danger">*</span></label>
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'nom']) !!}
                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                </div>
            </div>
            <div>
                <div class="form-group" id="departement_id">
                    <label class="control-label">Collectivité <span class="text-danger">*</span></label>

                        {!! Form::select('collectivte_id', $collectivites, null, ['id' => 'region', 'class' => 'form-control select2 dynamic']) !!}

                </div>
            </div>
           {{--  <div>
                <div class="form-group" id="statut">
                    <label class="control-label">Active  <span class="text-danger">*</span></label>
                    {!! Form::checkbox('statut', '1', '0', ['id' => 'statut']) !!}
                </div>
            </div> --}}
            {!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
            <a href="javascript:history.back()" class="btn btn-default">
                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
            </a>
    </div>
</div>



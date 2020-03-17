<div class="modal fade" id="membreModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content container-fluid">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'un membre pour ce cadre de concertation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => 'membre_cadres.store', 'class' => 'form-horizontal panel']) !!}
                <div class="row">
                        {{ Form::hidden('cadre_de_concertation_id', null ,['id' => 'cadre_id'])}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Prénom: <span class="text-danger">*</span></label>
                                {!! Form::text('prenom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Nom: <span class="text-danger">*</span></label>
                                {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Cadre de concertation <span class="text-danger">*</span></label>
                                {!! Form::select('reseauxSociaux[]', $reseauxSociaux ,null, ['id' => 'reseauxSociaux', 'class' => 'select2 js-example-basic-multiple dynamic', 'multiple'=>"multiple", 'required' => '']) !!}
                            </div>
                        </div> --}}
                </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Adresse <span class="text-danger">*</span></label>
                                {!! Form::text('adresse', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Adresse']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Téléphone: <span class="text-danger">*</span></label>
                                {!! Form::text('telephone', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Tel']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Email: <span class="text-danger">*</span></label>
                                {!! Form::text('email', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Email']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Fonction: <span class="text-danger">*</span></label>
                                {!! Form::text('fonction', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Fonction']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Statut <span class="text-danger">*</span></label>
                                {!! Form::text('statut_cadre',null, ['id' => 'date_creation', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Statut du cadres']) !!}
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="ti-check"></i> Enregistrer</button>
                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Annuler</button>
                </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>



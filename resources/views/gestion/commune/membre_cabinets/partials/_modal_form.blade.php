<div class="modal fade" id="membreModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'un membre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => 'reseau_social.store', 'class' => 'form-horizontal panel']) !!}
            <div class="" align="center">
                <div class="row">
                        {{ Form::hidden('membre_cabinet_id', null ,['id' => 'reseau_id'])}}
                        {{ Form::hidden('cle', null ,['id' => 'cle'])}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Réseau sociale <span class="text-danger">*</span></label>
                                {!! Form::select('libelle', $reseaux, null, ['id' => 'equipe_municipale_id', 'class' => 'form-control',
                                    'required' => '', 'placeholder' => 'Choisir...']) !!}
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Url: <span class="text-danger">*</span></label>
                            {!! Form::text('url', null, ['id' => 'url', 'class' => 'form-control', 'required' => '', 'placeholder' => 'URL de votre profile']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
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



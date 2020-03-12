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
            {!! Form::open(['route' => 'membre_cadres.store', 'class' => 'form-horizontal panel', 'files' => 'true']) !!}
            <div class="" align="center">
                <div class="row">
                        {{ Form::hidden('cadre_de_concertation_id', null ,['id' => 'cadre_id'])}}
                        <div class="col-md-6">

                        <div class="form-group">
                            <label class="control-label">Prénom: <span class="text-danger">*</span></label>
                            {!! Form::text('prenom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Prénom']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nom: <span class="text-danger">*</span></label>
                            {!! Form::text('nom', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Nom']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                    <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Adresse <span class="text-danger">*</span></label>
                            {!! Form::text('adresse', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Adresse']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Téléphone: <span class="text-danger">*</span></label>
                            {!! Form::text('telephone', null, ['id' => 'nom', 'class' => 'form-control', 'required' => '', 'placeholder' => 'Tel']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                        <div class="col-md-6">

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
                        <div class="form-group mb-0">
                            <label class="control-label">Photo</label>
                            {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control', 'placeholder'=>'Choisir la photo']) !!}
                            <span class="help-block"><small>La photo doit être au format jpg ou png et la dimension doit être min: 80x80 et max: 600x600.</small></span>
                            @if(isset($cadre) && !empty($cadre->photo))
                                <img class="avatar-min" src="{{ asset('storage/participation/comites/'. $cadre->photo) }}" alt="avatar"
                                    title="Photo du membre"/>
                            @endif
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



<div class="card col-md-8 col-lg-offset-2">
    <div class="card-heading">Création d'un article</div>
    <div class="card-body">
        <div class="col-lg-12">
                <h5 class="title">Ajout d'un article</h5>
                <hr>
            </div>

            <div>
                <div class="form-group">
                    <label class="control-label">Libellé de l'article  <span class="text-danger">*</span></label>
                    {!! Form::text('libelle', null, ['class' => 'form-control', 'placeholder' => 'Libelle article']) !!}
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label class="control-label">Description de l'article  <span class="text-danger">*</span></label>
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description article']) !!}
                </div>
            </div>

            <div style="margin-bottom: 15px; margin-left: 15px;">
                <a href="javascript:history.back()" class="btn btn-default">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>
                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
            </div>
    </div>

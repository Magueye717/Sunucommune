<div class="card col-md-8 col-lg-offset-2">
    <div class="card-heading">Création d'un article</div>
    <div class="card-body">
        <div class="col-lg-12">
                <h5 class="title">Ajout d'un article</h5>
                <hr>
            </div>

            <div>
                <div class="form-group">
                    <label class="control-label">Slug de l'article  <span class="text-danger">*</span></label>
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug article']) !!}
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label class="control-label">Titre de l'article  <span class="text-danger">*</span></label>
                    {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre article']) !!}
                </div>
            </div>

            <div >
                <div class="form-group">
                    <label class="control-label">Type d'article <span class="text-danger">*</span></label>
                    {!! Form::select('type_article_id', $TypeArticles, null, ['id' => 'type_article', 'class' => 'form-control select2 dynamic',]) !!}
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label class="control-label">Contenu de l'article <span class="text-danger">*</span></label>
                    {!! Form::textarea('texte', null, ['class' => 'form-control', 'placeholder' => 'text article']) !!}
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label class="control-label" for="avatars">Photo <span class="text-danger">*</span></label>
                    {!! Form::file('photo', ['class' => 'form-control', 'placeholder' => 'photo']) !!}
                </div>
             </div>

             <div>
                <div class="form-group">
                    <label class="control-label" for="avatars">Joindre fichier <span class="text-danger">*</span></label>
                    {!! Form::file('piece_jointe', ['class' => 'form-control', 'placeholder' => 'Joindre un fichier']) !!}
                </div>
             </div>
             @if(isset($article))
                {!! Form::hidden('article_id', $article->id) !!}
             @endif

            <div style="margin-bottom: 15px; margin-left: 15px;">
                <a href="javascript:history.back()" class="btn btn-default">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>
                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary']) !!}
            </div>
    </div>

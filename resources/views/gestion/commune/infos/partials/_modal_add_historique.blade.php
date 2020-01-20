<div id="add_historique" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="addHistoriqueLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addHistoriqueLabel">Ajout de l'historique de la commune</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($communeInfo, ['method' => 'PATCH', 'route' => ['historiques.update', $communeInfo], 'role' => 'form',
            'class' => 'sunucommune-form', 'data-toggle' => 'validator']) !!}
            @include('gestion.commune.infos.partials._form_historique')
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- /.modal diagnostic interpretation-->
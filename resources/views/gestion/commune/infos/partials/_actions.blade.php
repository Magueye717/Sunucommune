<div class="row">
    <div class="col-md-12 m-b-15">
        <div class="d-inline pull-right">
            @if(!isset($communeInfo))
                <a href="{{ route('infos.create') }}" class="btn btn-primary">
                    <i class="ti-plus"></i> Ajouter les informations
                </a>
            @else
                <a href="{{ route('infos.edit', $communeInfo) }}" class="btn btn-primary">
                    <i class="ti-pencil-alt m-r-5"></i> Mettre à jour les informations
                </a>
                @if(empty($communeInfo->historique))
                    <button class="btn btn-info" data-toggle="modal" data-target="#add_historique">
                        <i class="ti-plus m-r-5"></i> Ajouter l'historique
                    </button>
                    @include('gestion.commune.infos.partials._modal_add_historique')
                @else
                    <button class="btn btn-warning" data-toggle="modal" data-target="#add_historique">
                        <i class="ti-pencil-alt2 m-r-5"></i> Editer l'historique
                    </button>

                @endif
                @include('gestion.commune.infos.partials._modal_add_historique')
                <a href="{{ route('infos.ancien-maires.create', $communeInfo) }}" class="btn btn-info">
                    <i class="ti-user m-r-5"></i> Ajouter un ancien maire
                </a>
            @endif
        </div>
    </div>
</div>

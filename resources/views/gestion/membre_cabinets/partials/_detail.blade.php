<div class="row">
    <div class="col-sm-6 m-t-20">
        <ul class="list-group list-group-striped">
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Nom : </strong>
                    <span class="text-muted">{{ $membre->nom }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Prénom : </strong>
                    <span class="text-muted">{{ $membre->prenom }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Fonction : </strong>
                    <span class="text-muted">{{ $membre->fonction }}</span>
                </p>
            </li>
        </ul>
    </div>
    <div class="col-sm-6 m-t-20">
        <ul class="list-group list-group-striped">
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Adresse : </strong>
                    <span class="text-muted">{{ $membre->adresse }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Téléphone : </strong>
                    <span class="text-muted">{{ $membre->telephone }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="mg-b-0">
                    <strong class="tx-inverse tx-medium">Date d'ajout : </strong>
                    <span class="text-muted"> {!! $membre->created_at !!} </span>
                </p>
            </li>
        </ul>
    </div>
</div>
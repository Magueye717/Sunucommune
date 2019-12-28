<div class="row">
    <div class="col-sm-6 m-t-20">
        <ul class="list-group list-group-striped">
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Nom : </strong>
                    <span class="text-muted">{{ $user->nom }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Prénom : </strong>
                    <span class="text-muted">{{ $user->prenom }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Email : </strong>
                    <span class="text-muted">{{ $user->email }}</span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Adresse : </strong>
                    <span class="text-muted">{{ $user->adresse }}</span>
                </p>
            </li>
        </ul>
    </div>
    <div class="col-sm-6 m-t-20">
        <ul class="list-group list-group-striped">
            <li class="list-group-item">
                <p class="m-b-0">
                    <strong class="tx-inverse tx-medium">Rôle : </strong>
                    <span class="text-muted">
                        @foreach($user->roles as $role)
                            <span class="label label-primary m-l-5">
                                {{ $role->description }}
                            </span>
                        @endforeach
                    </span>
                </p>
            </li>
            <li class="list-group-item">
                <p class="mg-b-0">
                    <strong class="tx-inverse tx-medium">Date d'ajout : </strong>
                    <span class="text-muted"> {!! $user->created_at !!} </span>
                </p>
            </li>
        </ul>
    </div>
</div>

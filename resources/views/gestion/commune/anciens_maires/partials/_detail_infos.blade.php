<div class="row m-t-30">
    <div class="col-lg-3 col-md-3">
        <img src="{{ isset($communeInfo->photo_maire) ? asset('storage/commune/photos/' . $communeInfo->photo_maire) : asset('themev1/images/default.png') }}"
             alt="avatar" class="profil-avatar">
    </div>
    <div class="col-lg-9 col-md-9">
        <ul class="list-group list-group-striped list-unstyled">
            <li>
                <p class="m-b-20">
                    <strong class="tx-inverse tx-medium">Commune: </strong>
                    <span class="text-muted">{{ $communeInfo->collectivite->nom }}</span>
                </p>
            </li>
            <li>
                <p class="m-b-20">
                    <strong class="tx-inverse tx-medium">Prénom & Nom du Maire : </strong>
                    <span class="text-muted">{{ $communeInfo->maire }}</span>
                </p>
            </li>
            <li>
                <p class="m-b-20">
                    <strong class="tx-inverse tx-medium">Date de création de la commune : </strong>
                    <span class="text-muted"> {{ $communeInfo->date_creation }} </span>
                </p>
            </li>
            <li>
                <p class="m-b-20">
{{--                    <strong class="tx-inverse tx-medium">Superficie de la commune (en m²) : </strong>--}}
                    <strong class="tx-inverse tx-medium">Superficie de la commune : </strong>
                    <span class="text-muted "> {{ $communeInfo->superficie }} </span>
                    <strong class="tx-inverse tx-medium"> m² </strong>

                </p>
            </li>
            <li>
                <p class="m-b-20">
                    <strong class="tx-inverse tx-medium">Population : </strong>
                    <span class="text-muted"> {{ $communeInfo->population }} </span>
                    <strong class="tx-inverse tx-medium"> Hbts </strong>

                </p>
            </li>
            <li>
                <p class="m-b-5"><strong class="tx-inverse tx-medium">Mot du maire</strong></p>
            </li>
            <li>
                <p>
                    <span class="text-muted"> {!! $communeInfo->mot_du_maire !!} </span>
                </p>
            </li>
        </ul>
    </div>
</div>

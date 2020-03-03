<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <fieldset>
                <legend>Identité de la structure :</legend>
                <div class="brand-item pull-lef mt-5">
                    <img src="{{ isset($ressource->photo) ? asset('storage/commune/infrastructures/files/' . $ressource->photo) : asset('themev1/images/default.png') }}" alt="ss" width="300px">
                </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Nom de la structure:</strong>
                    <span class="badge badge-primary badge-pill">{{$ressource->nom}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Domaine d'activité :</strong>
                      <span class="badge badge-primary badge-pill">{{$ressource->secteur->nom}}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Localisation (lieu) :</strong>
                      <span class="badge badge-primary badge-pill">{{$ressource->collectivite->nom}}</span>
                      </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Latitute, Logitude, Altitude :</strong>
                        <span class="badge badge-primary badge-pill">{{$ressource->altitude}}</span>
                        <span class="badge badge-primary badge-pill">{{$ressource->longitude}}</span>
                        <span class="badge badge-primary badge-pill">{{$ressource->latittude}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Heure ouverture :</strong>
                      <span class="badge badge-primary badge-pill">{{$ressource->heure_ouverture}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Heure fermeture :</strong>
                      <span class="badge badge-primary badge-pill">{{$ressource->heure_fermeture}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Ajouté le :</strong>
                      <span class="badge badge-primary badge-pill">{{$ressource->created_at->format('j F, Y')}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Statut :</strong>
                        @if($ressource->statut===1)
                        <span class="badge badge-primary label-success badge-pill">Publié</span>
                        @else
                            <span class="badge badge-primary label-danger badge-pill">Non publié</span>
                        @endif
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Description :</strong> <i class="fa fa-paragraph" aria-hidden="true"></i>
                        <p>{!! $ressource->description !!}</p>
                    </li>
                  </ul>
                  
            </fieldset>
            <fieldset>
                <legend>Contacts</legend>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <strong>Téléphone :</strong>
                    <span class="badge badge-primary badge-pill">{{$ressource->telephone}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Email :</strong>
                        <span class="badge badge-primary badge-pill">{{$ressource->email}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Adresse :</strong>
                        <span class="badge badge-primary badge-pill">{{$ressource->adresse}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Personne responsable :</strong>
                      <span class="badge badge-primary badge-pill">{{$ressource->personne_contact}}</span>
                    </li>
            </fieldset>
        </div>
    </div>
</div>
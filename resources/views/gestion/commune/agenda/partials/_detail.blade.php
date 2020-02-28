<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-12">
        <div class="">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Titre de l'activité : </strong>
                {{ $agenda->libelle }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Lieu : </strong>
                {{ $agenda->lieu }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Date de l'activité : </strong>
                {{ $agenda->date_evenement }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Description : </strong>
                {!! $agenda->description !!}
            </p>
        </div>
        <div class="m-t-15">
            <strong class="tx-inverse tx-medium">Photo : </strong>
            <p class="mb-0">
                @if(!empty($agenda->photo))
                    <img src="{{ asset('storage/commune/agenda/files/'. $agenda->photo) }}" alt="Illustration"
                         class="img-responsive img-thumbnail m-t-10">
                @else
                    Aucun média n'a été ajouté...
                @endif
            </p>
        </div>
    </div>
</div>

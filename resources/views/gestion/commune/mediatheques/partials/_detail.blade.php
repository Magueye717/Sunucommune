<div class="row">
    <div class="col-lg-10 col-lg-offset-1 col-md-12">
        <div class="">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Type de média : </strong>
                {{ $media->type_media }}
            </p>
        </div>
        <div class="m-t-15">
            <p class="mb-0">
                <strong class="tx-inverse tx-medium">Description : </strong>
                {{ $media->description }}
            </p>
        </div>
        <div class="m-t-15">
            <strong class="tx-inverse tx-medium">Illustration : </strong>
            <p class="mb-0">
                @if(!empty($media->fichier))
                    <img src="{{ asset('storage/commune/mediatheques/'. $media->fichier) }}" alt="Illustration"
                         class="img-responsive img-thumbnail m-t-10">
                @else
                    Aucun média n'a été ajouté...
                @endif
            </p>
        </div>
    </div>
</div>

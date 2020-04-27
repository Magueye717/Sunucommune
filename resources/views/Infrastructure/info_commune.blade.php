<div class="container pt-50 pb-50">
            <div class="row">
                <div class="col-lg-2 col-md-1 col-sm-12 "></div>
                <div class="col-lg-4 col-md-6 col-sm-12 ">
                    <div class="about_img" >
                        <img src="assets/images/img-plateforme.svg" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12 ">
                    <div class="about_item_tb mt-10">
                    <div class="about_item_tbcell ">
                         <h3>Presentation de la plateforme
                            <br>SUNU COMMUNE</h3>
                            @if(empty($communeInfo->historique))
                            <p>La commune de {!! $communeInfo->collectivite->nom !!} est créé le {{ $communeInfo->date_creation }} et compte {{ $communeInfo->population }} habitants avec une superficie de {{ $communeInfo->superficie }} mètres carrés .</p>
                            @else
                                <p> {{ strip_tags(TruncateTexte::truncate($communeInfo->historique,850)) }} </p>
                            @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>

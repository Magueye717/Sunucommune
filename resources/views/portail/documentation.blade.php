<div class="blog-list white-bg mt-50 ml-0 mr-0 " style="border-radius: 5%;">
    <div class="blog-title">
        <h3 class="title">Documentation</h3>
    </div>
    <div class="blog-list-item">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom fichier</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projets->sortByDesc('created_at')->slice(0, 6) as $ActualiteEvenement) @if($ActualiteEvenement->typeArticle->libelle==='Délibération'&& $ActualiteEvenement->est_publie===1 )
                <tr>
                    <th scope="row"><img src="assets/images/pdf.jpeg" width="30" height="20px" alt="Service Image"></th>
                    <td alt="Service Image">{{strip_tags(TruncateTexte::truncate($ActualiteEvenement->titre,30))}}</td>
                    <th scope="row">
                        <a><img src="assets/images/downloadv.png" width="30" height="30px" alt="Service Image"></a>
                    </th>
                </tr>
                @endif @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-outline-primary btn-lg btn-block">Voir plus</button>
    </div>
</div>

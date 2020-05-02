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
                    <th scope="col">Telechargement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliberations->sortByDesc('created_at')->slice(0, 6) as $deliberation)
                @if($deliberation->typeArticle->libelle==='Délibération'&& $deliberation->est_publie===1 )
                <tr>
                    <th scope="row"><img src="assets/images/pdf.jpeg" width="30" height="20px" alt="Service Image"></th>
                    <td alt="Service Image">{{strip_tags(TruncateTexte::truncate($deliberation->titre,30))}}</td>
                    <th scope="row">

                    <a href="storage/commune/articles/files/{{$deliberation->piece_jointe}}" download="{{$deliberation->piece_jointe}}"><img src="assets/images/downloadv.png" width="30" height="30px" alt="Service Image"></a>
                    {{-- <a href="{{asset('storage/commune/articles/files/'. $deliberation->piece_jointe) }}"><img src="assets/images/downloadv.png" width="30" height="30px" alt="Service Image"></a> --}}
                    </th>
                </tr>
                @endif @endforeach
            </tbody>
        </table>
        @if($projets->count() <= 0)
            <div class="text-center ">
                <h4 style="color:#12BDE3;">Aucune Deliberation</h4>
                <img style="width:50%; height:50%;"  src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
            </div>
        @endif
        @if($deliberations->count() >= 5)
        <div>
            <button type="button" class="btn btn-outline-primary btn-lg btn-block">Voir plus</button>
        </div>
        @endif
    </div>
</div>

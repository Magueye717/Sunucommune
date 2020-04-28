<div class="blog-list white-bg mt-50 ml-0 mr-0" style="border-radius: 5%;">
    <div class="blog-title">
        <h3 class="title">Agenda de la mairie</h3>
    </div>
    <div class="blog-list-item">
        <table class="table table-striped center">
            <thead>
            <tr>
                <th scope="col">Libelle</th>
                <th scope="col">Date de l'évênement</th>
                <th scope="col">Quartiers/villages</th>
                <th scope="col">lieu</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($agendas as $key => $agenda)
                @if($agenda->est_publie == 1)
                <tr>
                    <td>{{$agenda->libelle}}</td>
                    <td>{{$agenda->date_evenement}}</td>
                    <td>{{$agenda->collectivite->nom}}</td>
                    <td>{{$agenda->lieu}}</td>
                    <td><button type="button" class="btn btn-outline-primary btn-sm">Voir plus</button>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>

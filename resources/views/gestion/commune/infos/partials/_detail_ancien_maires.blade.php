<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Commentaire</th>
                    <th>Effectuée par</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($logs))
                    @php $compteur = 1 @endphp
                    @foreach($logs as $log)
                        <tr>
                            <td>{{ $compteur }}</td>
                            <td>{{ \App\Enums\ActionBeneficiaire::getDescription($log->action) }}</td>
                            <td>{{ $log->commentaire }}</td>
                            <td>{{ $log->ajouterPar->identite }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                        @php $compteur++ @endphp
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Debut Mandat</th>
                    <th>Fin Mandat</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($ancienMaires))
                    @php $compteur = 1 @endphp
                    @foreach($ancienMaires as $ancien_maire)
                        <tr>

                            <td>

                                <img src="{{ isset($ancien_maire->photo) ? asset('storage/commune/photos/' . $ancien_maire->photo) : asset('themev1/images/default.png') }}" alt="ss" class="img-thumbnail table-photo"></td>
                            <td>{{ $ancien_maire->prenom }}</td>
                            <td>{{ $ancien_maire->nom }}</td>
                            <td>{{ $ancien_maire->date_debut_mandat }}</td>
                            <td>{{ $ancien_maire->date_fin_mandat }}</td>

{{--                            <td>{{ $log->commentaire }}</td>--}}
{{--                            <td>{{ $log->commentaire }}</td>--}}
{{--                            <td>{{ $log->ajouterPar->identite }}</td>--}}
{{--                            <td>{{ $log->created_at }}</td>--}}
                        </tr>

                        @php $compteur++ @endphp
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
{{--<div class="row">--}}
{{--    <div class="col-md-12">--}}
{{--        <div class="table-responsive">--}}
{{--            <table class="table table-striped table-bordered table-condensed">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>#</th>--}}
{{--                    <th>Action</th>--}}
{{--                    <th>Commentaire</th>--}}
{{--                    <th>Effectuée par</th>--}}
{{--                    <th>Date</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @if(!empty($logs))--}}
{{--                    @php $compteur = 1 @endphp--}}
{{--                    @foreach($logs as $log)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $compteur }}</td>--}}
{{--                            <td>{{ \App\Enums\ActionBeneficiaire::getDescription($log->action) }}</td>--}}
{{--                            <td>{{ $log->commentaire }}</td>--}}
{{--                            <td>{{ $log->ajouterPar->identite }}</td>--}}
{{--                            <td>{{ $log->created_at }}</td>--}}
{{--                        </tr>--}}
{{--                        @php $compteur++ @endphp--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

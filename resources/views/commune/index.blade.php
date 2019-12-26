@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading ">Liste des communes</div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                        <th scope="col">Nom commune</th>
                        <th></th>
                        <th scope="col">Nollectivité</th>
                        <th></th>
                        <th scope="col">Statut</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($communes as $commune)
                    <tr role="row" class="odd">
                    <td>{{ $commune->nom }}</td>
                    <td></td>
                    <td>{{ $commune->collectivite }}</td>
                    <td></td>
                    <td>{{ $commune->statut }}</td>
                    <td><a href=""><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-list" aria-hidden="true"></i>Liste départements</button></a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
  </div>

@endsection

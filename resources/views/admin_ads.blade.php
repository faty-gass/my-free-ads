@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3> Liste des annonces </h3>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="align-middle text-center">Titre</th>
                            <th class="align-middle text-center">Catégorie</th>
                            <th class="align-middle text-center">Lieu</th>
                            <th class="align-middle text-center">Prix</th>
                            <th class="align-middle text-center">User</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ads as $ad)
                        <tr>
                            <td class="align-middle" >{{$ad->title}}</td>
                            <td class="align-middle">{{$ad->category}}</td>
                            <td class="align-middle text-center">{{$ad->location}}</td>
                            <td class="align-middle text-center">{{$ad->price}}€</td>
                            <td class="align-middle text-center">{{$users::where('id',$ad->user_id)->first()->login }}</td>
                            <td><a href="/info_ad/{{$ad->id}}" class="btn btn-light">Voir</a></td>
                            <td><a href="/update_ad/{{$ad->id}}" class="btn btn-light">Modifier</a></td>
                            <td><a href="/delete_ad/{{$ad->id}}" class="btn btn-danger">Supprimer</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

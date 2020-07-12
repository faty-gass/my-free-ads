@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3> Mes informations </h3>
                <p>Mon Login : {{$users->login}}</p>
                <p>Mon Surnom : {{$users->nickname}}</p>
                <p>Mon Email : {{$users->email}}</p>
                <p>Mon Téléphone : {{$users->phone}}</p>
                <a href="/update_user/{{$users->id}}" class="btn btn-primary">Mettre à jour</a>

            <h3 class="mt-4"> Mes annonces </h3>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="align-middle text-center">Titre annonce</th>
                            <th class="align-middle text-center">Catégorie</th>
                            <th class="align-middle text-center">Lieu</th>
                            <th class="align-middle text-center">Prix</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ads as $ad)
                        <tr>
                            <td class="align-middle">{{$ad->title}}</td>
                            <td class="align-middle">{{$ad->category}}</td>
                            <td class="align-middle">{{$ad->location}}</td>
                            <td class="align-middle">{{$ad->price}}€</td>
                            <td><a href="/info_ad/{{$ad->id}}" class="btn btn-info">Voir</a></td>
                            <td><a href="/update_ad/{{$ad->id}}" class="btn btn-secondary">Modifier</a></td>
                            <td><a href="/delete_ad/{{$ad->id}}" class="btn btn-danger">Supprimer</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/add_ads" class="btn btn-primary">Créer une annonce</a>  
        </div>
    </div>
</div>
@endsection

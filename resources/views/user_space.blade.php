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
                <a href="/update_user/{{$users->id}}" class="btn btn-secondary">Mettre à jour</a>

            <h3> Mes Annonces </h3>
                <table>
                    <thead>
                        <tr>
                            <th>Titre annonce</th>
                            <th>Catégorie</th>
                            <th>Lieu</th>
                            <th>Prix</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ads as $ad)
                        <tr>
                            <td>{{$ad->title}}</td>
                            <td>{{$ad->category}}</td>
                            <td>{{$ad->location}}</td>
                            <td>{{$ad->price}}</td>
                            <td><a href="/info_ad/{{$ad->id}}">Voir</a></td>
                            <td><a href="/update_ad/{{$ad->id}}">Modifier</a></td>
                            <td><a href="/delete_ad/{{$ad->id}}">Supprimer</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection

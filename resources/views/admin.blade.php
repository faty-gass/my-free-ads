@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3> Liste des utilisateurs </h3>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="align-middle text-center">Login</th>
                        <th class="align-middle text-center">Surnom</th>
                        <th class="align-middle text-center">Email</th>
                        <th class="align-middle text-center">Téléphone</th>
                        <th class="align-middle text-center">Statut</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="align-middle">{{$user->login}}</td>
                        <td class="align-middle">{{$user->nickname}} </td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->phone}}</td>
                        <td class="align-middle text-center">@if ($user->is_admin) Admin @else Non Admin @endif</td>
                        <td><a href="/update_user/{{$user->id}}" class="btn btn-secondary">Modifier</a></td>
                        <td><a href="/delete_user/{{$user->id}}" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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
                        <td class="align-middle text-center">{{$users->where('id',$ad->user_id)->first()->login }}</td>
                        <td><a href="/info_ad/{{$ad->id}}" class="btn btn-info">Voir</a></td>
                        <td><a href="/update_ad/{{$ad->id}}" class="btn btn-secondary">Modifier</a></td>
                        <td><a href="/delete_ad/{{$ad->id}}" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

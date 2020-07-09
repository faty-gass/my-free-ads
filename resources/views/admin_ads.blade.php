@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3> Liste des annonces </h3>
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

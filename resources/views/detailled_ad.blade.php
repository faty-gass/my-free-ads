@extends('layouts.app')

@section('title') Détail annonce @endsection
@section('content')
<div class="container">
    <div class="card d-flex flex-row justify-content-start align-items-center mb-4">
        <div class="col-md-4">
            <img src={{asset('storage/'.$ads->image)}} class="card-img" alt={{$ads->title}}>
        </div>
        <div class="col-md-8 text-break">
            <h3 class="mb-4"> Détail de l'annonce </h3>
            <p>Titre : {{$ads->title}} </p>
            <p>Catégorie : {{$ads->category}} </p>
            <p>État : @if ($ads->state=="new") Neuf @elseif ($ads->state=="good") Reconditionné @else Occasion @endif</p>
            <p>Prix : {{$ads->price}}€</p>
            <p class="text-break">Description : {{$ads->description}}</p>
            <p>Lieu : {{$ads->location}}</p>
            <p>Propriétaire : {{$users::where('id',$ads->user_id)->first()->login}} </p>

        </div>
    </div>
    <a href="{{ url('/accueil') }}" class="btn btn-dark text-right">Retour aux annonces</a>
</div>
@endsection

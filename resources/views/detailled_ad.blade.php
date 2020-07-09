@extends('layouts.app')

@section('title') Détail annonce @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3> Détail de l'annonce </h3>
            <p>Titre : {{$ads->title}} </p>
            <p>Catégorie : {{$ads->category}} </p>
            <p>État : {{$ads->state}} </p>
            <p>Prix : {{$ads->price}} </p>
            <p>Description : {{$ads->description}}</p>
            <p>Lieu : {{$ads->location}} {{$ads->image}}</p>
            <p><img src="{{$ads->image}}" alt="{{$ads->title}}" /></p>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')


@section('content')
<div class="container">
    <div class=" justify-content-center">
    <h3> Annonces </h3>
    @foreach ($ads as $ad)
        <div class="col-md-10">
            <p>Titre : {{$ad->title}} </p>
            <p>Catégorie : {{$ad->category}} </p>
            <p>État : {{$ad->state}} </p>
            <p>Prix : {{$ad->price}} </p>
            <p>Description : {{$ad->description}}</p>
            <p>Lieu : {{$ad->location}} {{$ad->image}}</p>
            <p><img src="flower.jpg" alt="x" /></p>
        </div>
        @endforeach
    </div>
</div>
@endsection

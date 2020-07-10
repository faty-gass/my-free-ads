@extends('layouts.app')


@section('content')
<div class="container">
    <div class=" justify-content-center">
    
        <form method="post" action="{{route('search_result')}}" class="container" >
            
            <label for="search_bar"> Recherche</label>
            <input type="search" name="search" placeholder="Rechercher une annonce" />
        
            <p>Filtres annonces</p>
            <label for="catg_filter">Catégorie</label>
            <select id="catg_filter" name='category'>
                <option value=all> Toute </option>
                <option value="auto" >Automobile</option>
                <option value="multimedia">Multimédia</option>
                <option value="furniture">Meuble</option>
            </select></br>
            <label for='state_filter'>État</label>
            <select id='state_filter' name='state'>
                <option value=all> Tous </option>
                <option value="new" >Neuf</option>
                <option value="good">Reconditionné</option>
                <option value="used">Occasion</option>
            </select></br>
            <div id="price_filter"> Fourchette de prix </br>
            <input type="radio" name="price_range" value="less100" id="opt1"/><label for='opt1'> < 100€ </label></br>
            <input type="radio" name="price_range" value="100to200" id="opt2"/><label for='opt2'> 100€ à 200€ </label></br>
            <input type="radio" name="price_range" value="more200" id="opt3"/><label for='opt3'> > 200€ </label></br>
            </div>
            <input type="submit" value="Valider"/>
        </form>

        <h3> Annonces </h3>
    @foreach ($ads as $ad)
        <div class="col-md-10">
            <p>Titre : {{$ad->title}} </p>
            <p>Catégorie : {{$ad->category}} </p>
            <p>État : {{$ad->state}} </p>
            <p>Prix : {{$ad->price}} </p>
            <p>Description : {{$ad->description}}</p>
            <p>Lieu : {{$ad->location}} {{$ad->image}}</p>
            <p><img src="bonnet.jpg" alt="x" /></p>
            <p><img src={{asset('/images/'.$ad->image)}} alt="y" /></p>
        </div>
        @endforeach
    </div>
</div>
@endsection

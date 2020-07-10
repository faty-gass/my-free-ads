@extends('layouts.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-start">
        <aside>
            <form method="post" action="{{route('search_result')}}" class="container" >
            @csrf 
                <label for="search_bar"> Recherche</label></br>
                <input type="search" name="search" placeholder="Rechercher une annonce" />
            
                <p class="mb-0 mt-4">Filtrer par :</p>
                <label for="catg_filter">Catégorie</label>
                <select id="catg_filter" name='category'>
                    <option value=all> Toute </option>
                    <option value="automobile" >Automobile</option>
                    <option value="multimedia">Multimédia</option>
                    <option value="meuble">Meuble</option>
                </select></br>
                <label for='state_filter'>État</label>
                <select id='state_filter' name='state'>
                    <option value=all> Tous </option>
                    <option value="new" >Neuf</option>
                    <option value="good">Reconditionné</option>
                    <option value="used">Occasion</option>
                </select></br>
                <div id="price_filter"> Fourchette de prix </br>
                <input type="radio" name="price_range" value="less100" id="opt1"/><label for='opt1' class="ml-2"> < 100€ </label></br>
                <input type="radio" name="price_range" value="100to200" id="opt2"/><label for='opt2'class="ml-2"> 100€ à 200€ </label></br>
                <input type="radio" name="price_range" value="more200" id="opt3"/><label for='opt3' class="ml-2"> > 200€ </label></br>
                </div>
                <input type="submit" value="Valider"/>
            </form>
        </aside>
        <div id="bloc-ads" class="mw-100">
            <h3> Annonces </h3>

            @foreach ($ads as $ad)
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src={{asset('storage/'.$ad->image)}} class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body d-flex flex-column justify-content-between" style="min-width:200px">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">{{$ad->title}}</h4>
                            <p>Catégorie : {{$ad->category}} </p>
                        </div>
                        <p class="card-text">{{$ad->description}}</p>
                        <div class="d-flex justify-content-between">
                            <p>@if ($ad->state=="new") Neuf @elseif ($ad->state=="good") Reconditionné @else Occasion @endif </p>
                            <p>Prix : {{$ad->price}}€</p>
                        </div>
                        <p><small class="text-muted">Vendu par {{$users->where('id',$ad->user_id)->first()->login }} à {{$ad->location}}</small></p>
                        <a href="/info_ad/{{$ad->id}}" class="stretched-link"></a>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

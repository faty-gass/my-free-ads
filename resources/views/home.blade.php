@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h2 text-center">{{ __("Bienvenue sur My Classifieds !") }}</div>
                <img class="card-img-top" src={{asset('storage/logo_classifieds.png')}} alt="Card image cap">
                <a href="/accueil" class="btn btn-light stretched-link">Accéder aux annonces</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
                    
                </div>
            </div>
                @if (Auth::id()) 
                    <!--<p> Vous êtes connecté !!</p>-->
                        @if (Auth::user()->is_admin == 0)
                    <a href="/user_space/{{Auth::id()}}" class="btn btn-primary mt-4">Accéder à mon espace</a>
                        @else
                    <a href="/admin" class="btn btn-primary mt-4">Accéder à l'espace administrateur</a>
                        @endif  
                @endif
        </div>
    </div>
</div>
@endsection

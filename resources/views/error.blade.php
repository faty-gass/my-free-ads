@extends('layouts.app')

@section('content')
<div class="container col-md-8" >
    <p class="alert alert-danger" role="alert">{{$error_message}}</p>

    @if (Auth::id()) 
            @if (Auth::user()->is_admin == 0)
        <a href="/user_space/{{Auth::id()}}" class="btn btn-secondary">Retour à mon espace</a>
            @else
        <a href="/admin" class="btn btn-secondary">Retour à l'espace administrateur</a>
            @endif  
        @endif
        <a href="/accueil" class="btn btn-secondary">Accéder aux annonces</a>
</div>
@endsection

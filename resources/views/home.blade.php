@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tableau de bord') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
                    @if (Auth::id()) 
                    <p> Vous êtes connecté !!</p>
                        @if (Auth::user()->is_admin == 0)
                    <a href="/user_space/{{Auth::id()}}" class="btn btn-secondary mr-3">Accéder à mon espace</a>
                        @else
                    <a href="/admin" class="btn btn-secondary mr-3">Accéder à l'espace administrateur</a>
                        @endif  
                    @endif
                    <a href="/accueil" class="btn btn-secondary">Accéder aux annonces</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

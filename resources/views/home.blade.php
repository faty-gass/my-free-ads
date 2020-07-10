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
                    <a href="/user_space/{{Auth::id()}}" class="btn btn-secondary">Accéder à mon espace</a>
                    @endif
                    <a href="/accueil" class="btn btn-secondary">Accéder aux annonces</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

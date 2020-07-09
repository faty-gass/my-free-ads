@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h3> Détail utilisateurs </h3>
            <table>
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Surnom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->login}}</td>
                        <td>{{$user->nickname}} </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td><a href="/update_user/{{$user->id}}">Modifier</a></td>
                        <td><a href="/delete_user/{{$user->id}}">Supprimer</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

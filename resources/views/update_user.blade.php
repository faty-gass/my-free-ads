@extends('layouts.app')

@section('content')

<div class="container col-md-10">
<h3 class="text-center mb-4"> Modification utilisateurs </h3>

<div class="">

<form method="POST" action="{{route('update_user')}}">
    @csrf
    <input type="hidden" name="id" value="{{$users->id}}"/>
    <div class="form-group row">
        <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>
        <div class="col-md-6">
            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ $users->login }}" required autocomplete="login" autofocus>
            @error('login')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>
        <div class="col-md-6">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" required autocomplete="phone" autofocus>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="nickname" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo') }}</label>
        <div class="col-md-6">
            <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $users->nickname }}" required autocomplete="nickname" autofocus>
            @error('nickname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @if ( $user::where('id',Auth::id())->first()->is_admin == 1 )
    <div class="form-group row">
        <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>
        <div class="col-md-6">
            <input id="is_admin" type="checkbox" class="form-control" name="is_admin" @if ($users->is_admin)==1 { echo checked } @endif >
        </div>
    </div>
    @endif

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Valider') }}
            </button>
        </div>
    </div>
</form>
</div>
@endsection

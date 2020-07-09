@extends('layouts.app')

@section('title') Création annonce @endsection
@section('content')
        <div class="container">
            <form method="POST" action="{{route('new_ad')}}" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for='title'>Titre de l'annonce</label>
                <input type='text' name='title' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='category'>Catégorie</label>
                <input type='text' name='category' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='description'>Description</label>
                <textarea type='text' name='description' class='form-control'></textarea>
            </div>
            <div class="form-group">
                <label for='price'>Prix</label>
                <input type='number' name='price' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='state'>État</label>
                <input type='text' name='state' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='location'>Lieu</label>
                <input type='text' name='location' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='image'>Image</label>
                <input type='file' name='image' accept="image/*" class='form-control'/>
            </div>
            <div class="form-group">
                <label for='user_id'>User_id</label>
                <input type='text' name='user_id' class='form-control'/>
            </div>
            
            <input type="submit" value="Valider" class="btn btn-primary"/>
            
            
            </form>
        </div>
@endsection

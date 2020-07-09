@extends('layouts.app')

@section('content')
        <div class="container">
            <form method="POST" action="{{route('update_ad')}}" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="id" value="{{$ads->id}}"/>
            <div class="form-group">
                <label for='title'>Titre de l'annonce</label>
                <input type='text' name='title' value='{{$ads->title}}' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='category'>Catégorie</label>
                <input type='text' name='category' value='{{$ads->category}}'class='form-control'/>
            </div>
            <div class="form-group">
                <label for='description'>Description</label>
                <textarea type='text' name='description' value='{{$ads->description}}' class='form-control'></textarea>
            </div>
            <div class="form-group">
                <label for='price'>Prix</label>
                <input type='number' name='price' value='{{$ads->price}}' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='state'>État</label>
                <input type='text' name='state' value='{{$ads->state}}' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='location'>Lieu</label>
                <input type='text' name='location' value='{{$ads->location}}' class='form-control'/>
            </div>
            <div class="form-group">
                <label for='image'>Image</label>
                <input type='file' name='image' accept="image/*" class='form-control'/>
            </div>
            <div class="form-group">
                <label for='user_id'>User_id</label>
                <input type='text' name='user_id' value='{{$ads->user_id}}' class='form-control'/>
            </div>
            
            <input type="submit" value="Valider" class="btn btn-primary"/>
            
            
            </form>
        </div>
@endsection

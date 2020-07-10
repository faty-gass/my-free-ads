@extends('layouts.app')

@section('content')
        <div class="container col-md-10">
            <form method="POST" action="{{route('update_ad')}}" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="id" value="{{$ads->id}}"/>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for='category'>Catégorie</label></br>
                    <select id='category' name='category'>
                        <option value="auto" >Automobile</option>
                        <option value="multimedia">Multimédia</option>
                        <option value="furniture">Meuble</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <label for='title'>Titre de l'annonce</label>
                    <input type='text' name='title' value='{{$ads->title}}' class='form-control'/>
                </div>
                <div class="form-group col-md-3">
                    <label for='location'>Lieu</label>
                    <input type='text' name='location' value='{{$ads->location}}' class='form-control'/>
                </div>
            </div>
            <div class="form-group">
                <label for='description'>Description</label>
                <textarea type='text' name='description' value='{{$ads->description}}' class='form-control'></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 mr-4">
                    <label for='price'>Prix</label>
                    <input type='number' name='price' value='{{$ads->price}}' class='form-control'/>
                </div>
                <div class="form-group col-md-3 mr-4">
                    <label for='state'>État</label></br>
                    <select id='state' name='state'>
                        <option value="new" >Neuf</option>
                        <option value="good">Reconditionné</option>
                        <option value="used">Occasion</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for='image'>Image</label>
                    <input type='file' name='image' accept="image/*" class=''/>
                </div>
            </div>
            <!--<div class="form-group">
                <label for='user_id'>User_id</label>
                <input type='text' name='user_id' value='{{$ads->user_id}}' class='form-control'/>
            </div>-->
            
            <input type="submit" value="Valider" class="btn btn-secondary"/>
            
            
            </form>
        </div>
@endsection

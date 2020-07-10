<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\User;

class AdsController extends Controller
{
    public function addAds(){
        return view('add_ads');
    }


    public function createAds(Request $request){
        $ads = new Ads;
        /*$req = new ImagesRequests;
        $image_path= $this->addImage($req);*/
        $file = $request->file('image');
        if($file->isValid()){
			if($file->store('public')) {
				$path=$file->store('public');
			}
		} else { return "erreur de fichier";}
        $ads->title = $request->title;
        $ads->category = $request->category;
        $ads->description = $request->description;
        $ads->price = $request->price;
        $ads->state = $request->state;
        $ads->location = $request->location;
        $ads->image = $path;
        $ads->user_id = Auth::id();
        $ads->save();
        return "L'annonce a bien été ajoutée !";
    }

    public function getAds(){
        $ads= Ads::all();
        $users= new User;
        return view('admin_ads',['ads'=>$ads, 'users'=>$users]);
    }

    public function showAll(){
        $ads= Ads::all();
        return view('welcome',['ads'=>$ads]);
    }
    public function showUserSpace($user_id){
        $ads = Ads::where('user_id',$user_id)->get();
        $users = User::where('id',$user_id)->first();
        return view('user_space',['ads'=>$ads, 'users'=>$users]);
    }

    public function adDetails($id){
        $ads= Ads::where('id',$id)->first();
        $users = new User;
        return view ('detailled_ad',['ads'=>$ads, 'users'=>$users]);
    }

    public function editAds($id){
        $ads = Ads::where('id',$id)->first();
        return view('update_ad',['ads'=>$ads]);
    }

    public function updateAds(Request $request){
        $ads = Ads::where('id', $request->id)->first();
        $ads->title = $request->title;
        $ads->category = $request->category;
        $ads->description = $request->description;
        $ads->price = $request->price;
        $ads->state = $request->state;
        $ads->location = $request->location;
        $ads->save();
        return "l'annonce a été modifiée";
    }

    public function deleteAds($id){
        Ads::where('id',$id)->delete();
        return "L'annonce a été supprimée!";
    }
}

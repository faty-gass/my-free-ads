<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
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
                $file_name=substr($path,7);
			}
		} else { return "erreur de fichier";}
        $ads->title = $request->title;
        $ads->category = $request->category;
        $ads->description = $request->description;
        $ads->price = $request->price;
        $ads->state = $request->state;
        $ads->location = $request->location;
        $ads->image = $file_name;
        $ads->user_id = \Auth::id();
        $ads->save();
        $conf_message= "L'annonce a bien été ajoutée !";
        return view('confirmation',['conf_message'=>$conf_message]);
    }

    public function getAds(){
        $ads= Ads::all();
        $users= new User;
        return view('admin_ads',['ads'=>$ads, 'users'=>$users]);
    }

    public function showAll(){
        $ads= Ads::all();
        $users=User::all();
        return view('welcome',['ads'=>$ads,'users'=>$users]);
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
        $file = $request->file('image');
        if($file->isValid()){
			if($file->store('public')) {
                $path=$file->store('public');
                $file_name=substr($path,7);
			}
		} else { return "erreur de fichier";}
        $ads->title = $request->title;
        $ads->category = $request->category;
        $ads->description = $request->description;
        $ads->price = $request->price;
        $ads->state = $request->state;
        $ads->location = $request->location;
        $ads->image = $file_name;
        $ads->save();
        $conf_message= "L'annonce a été modifiée";
        return view('confirmation',['conf_message'=>$conf_message]);
    }

    public function deleteAds($id){
        Ads::where('id',$id)->delete();
        $conf_message= "L'annonce a été supprimée!";
        return view('confirmation',['conf_message'=>$conf_message]);
    }

    public function search(Request $request){
        $users=User::all();
        $entry= "%".$request->search."%";
        switch (true) {
            case $request->category=="automobile" :
                $catg=array("automobile"); break;
            case $request->category=="multimedia";
                $catg=array("multimedia"); break;
            case $request->category=="meuble";
                $catg=array("meuble"); break;
            default :
                $catg=array("automobile","multimedia","meuble");
        }
        switch (true){
            case $request->state=="new" :
                $state=array("new"); break;
            case $request->state=="good";
                $state=array("good"); break;
            case $request->state=="used";
                $state=array("used"); break;
            default :
                $state=array("new","good","used");
        }
        switch (true){
            case $request->price_range=="less100" :
                $range=array(0,100); break;
            case $request->price_range=="100to200";
                $range=array(100,200); break;
            case $request->price_range=="more200";
                $range=array(200,9999); break;
            default :
                $range=array(0,9999);
        }
        
        $ads= \DB::table('ads')
            ->where('title','like','%'.$request->search.'%')
            ->whereIn('category',$catg)
            ->whereIn('state',$state)
            ->whereBetween('price',$range)
            ->get();
        
        return view('welcome',['ads'=>$ads,'entry'=>$entry, 'users'=>$users]);
    }


}

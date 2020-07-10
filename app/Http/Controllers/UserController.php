<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ads;

class UserController extends Controller
{
    public function getUsers(){
        $users = User::all();
        $ads = Ads::all() ;
        return view('admin',['users'=>$users, 'ads'=>$ads]);
    }

    public function editUsers($id){
        $user = new User;
        $users = User::where('id',$id)->first();
        return view('update_user',['users'=>$users, 'user'=>$user]);
    }

    public function updateUsers(Request $request){
        $request->validate([
            'login' => 'required|max:255|unique:users,login,'.\Auth::id(),
            'email' => 'required|email|unique:users,email,'.\Auth::id(),
        ]);
        $users = User::where('id',$request->id)->first();
        $users->login = $request->login;
        $users->nickname = $request->nickname;
        $users->email = $request->email;
        $users->phone = $request->phone;
        if ($request->is_admin){
        $users->is_admin = 1;
        } else {
        $users->is_admin = 0;
        }
        $users->update();
        $conf_message="L'utilisateur a bien été mis à jour !";
        return view('confirmation',['conf_message'=>$conf_message]);
    }

    public function deleteUsers($id){
        User::where('id',$id)->delete();
        $conf_message="L'utilisateur a bien été supprimé !";
        return view('confirmation',['conf_message'=>$conf_message]);
    }
}

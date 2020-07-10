<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getUsers(){
        $users = User::all();
        return view('admin_users',['users'=>$users]);
    }

    public function editUsers($id){
        $user = new User;
        $users = User::where('id',$id)->first();
        return view('update_user',['users'=>$users, 'user'=>$user]);
    }

    public function updateUsers(Request $request){
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
        $users->save();
        return "l'utilisateur a été mis à jour";
    }

    public function deleteUsers($id){
        Ads::where('id',$id)->delete();
        return "L'utilisateur a été supprimée!";
    }
}

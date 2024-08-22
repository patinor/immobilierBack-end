<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUsersAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    

    public function index(){

        $usersAll=User::paginate(10);
        return view("admin.account.index",compact("usersAll"));
    }


    public function store(AddUsersAccountRequest $request){
        
        if($request->password != $request->password_confirmation){
            return back()->with("error","Les mots de passes sont différents");
        }  
        $image="";
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->password = bcrypt($request->password);
        if($request->hasFile("image")){
         $image = $request->file("image")->store('admin','public');
        }
        $user->profile = $image;
        
        $user->save();
        return redirect()->back()->with("success","Compte ajouté avec succes !");
    }
}

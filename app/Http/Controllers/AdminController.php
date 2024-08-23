<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUsersAccountRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    

    public function index(){

        $usersAll=User::paginate(10);
        return view("admin.account.index",compact("usersAll"));
    }

    
    public function login(){
        return view("admin.account.login");
    }


    public function doLogin(Request $request){
           
        $request->validate([
           'email'=>'required',
           'password'=>'required'
        ],[
            'email.required'=>'L email est requis dans le formulaire',
            'password.required'=>'Le mots de passe est requis dans le formulaire'

        ]);

        if(!Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                      toastr()->error('Information introuvable');
                      return back();
        }
        toastr()->info('Bienvenue !'.Auth::user()->name);

        return redirect()->route('home.admin');

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
    

    public function home(){
        return view('admin.index');

    }
}

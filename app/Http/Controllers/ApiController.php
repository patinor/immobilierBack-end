<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    

    public function index(){
      
        $user=Proprietaire::all();
        return  $user;
    }


    public function store(Request $request){

        $user= new Proprietaire();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->tel=$request->tel;
        $user->adresse=$request->adresse;
        $user->profile='';

        $user->save();


        return response()->json(['Propriétaire ajouté avec success !'=>$user]);

    }
}

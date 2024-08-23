<?php

namespace App\Http\Controllers;

use App\Models\BienImmobilier;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    

    public function index(){
      
        $BienImmobilier=BienImmobilier::with('categorie','proprietaire')->get();

        return $BienImmobilier;
    }


    public function getImage($file){

        
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

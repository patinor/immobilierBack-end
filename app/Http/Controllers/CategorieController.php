<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorieAll=Categorie::paginate(10);

        return view('admin.categorie.index',[
            'categorieAll'=>$categorieAll
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategorieRequest $request)
    {
        
       $categorie= new Categorie();
       $categorie->categorie=$request->categorie;
       $categorie->status=$request->status;
       $categorie->save();
       toastr()->info('Catégorie ajouté avec success !');
       return back();
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $categorie=Categorie::find($id);
        if(!$categorie){
            toastr()->error("La catégorie n existe plus !");
            return back();
        }

        return view('admin.categorie.edit',[
            'cat'=>$categorie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'categorie'=>'required',
            'status'=>'required',
            'id'=>'required|exists:categories,id',

        ],[
            'categorie.required'=>'La catégorie ',
            'status.required'=>'Une erreur c est produite au niveau du statut',
            'categorie.unique'=>'La catégorie existes déjà dans la base !', 
            'id.exists'=>'La catégorie n existes plus !',     
    
        ]);
        $categorie=Categorie::find($request->id);
        if(!$categorie){
            toastr()->error('Catégorie ajouté avec success !');
            return back();

        }
        $categorie->categorie=$request->categorie;
        $categorie->status=$request->status;
        $categorie->save();
        toastr()->info('Catégorie ajouté avec success !');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

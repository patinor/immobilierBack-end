<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBienImmobilierRequest;
use App\Http\Requests\UpdateBienImmobilierReqest;
use App\Models\BienImmobilier;
use App\Models\Categorie;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class BienImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bienImmobillier=BienImmobilier::with('categorie')->paginate(10);
        $categorie=Categorie::all();

        $user=Proprietaire::all();

        return view('admin.bien.index',compact('bienImmobillier','categorie','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie=Categorie::all();

        $user=Proprietaire::all();
        $bienImmobillier=BienImmobilier::with('categorie')->paginate(10);

        return view('admin.bien.store',compact('bienImmobillier','categorie','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBienImmobilierRequest $request)
    {
        $bien=new BienImmobilier();
        $bien->titre=$request->titre;
        $bien->status=$request->status;
        $bien->superficie=$request->superficie;
        $bien->prix_location=$request->prix_location;
        $bien->categorie_id=$request->categorie_id;
        $bien->proprietaire_id=$request->proprietaire_id;
        $bien->status=false;
        if($request->status==true){
            $bien->status=true;
        }

        if($request->hasFile('image')){
            $bien->image=$request->file('image')->store('bien','public');

        }
        $bien->save();
        toastr()->success("Bien immobilé ajouté avec success !");

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bien=BienImmobilier::find($id);
        if(!$bien){
            toastr()->error('Le bien n existe pas veuillez rafraichir la page');
            return back();
        }

        $categorie=Categorie::all();

        $user=Proprietaire::all();

        return view('admin.bien.show',compact('bien','categorie','user'));

    }

  
    public function edit(string $id)
    {
        $bien=BienImmobilier::find($id);
        if(!$bien){
            toastr()->error('Le bien n existe pas veuillez rafraichir la page');
            return back();
        }

        $categorie=Categorie::all();

        $user=Proprietaire::all();

        return view('admin.bien.edit',compact('bien','categorie','user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBienImmobilierReqest $request)
    {
        $bien=BienImmobilier::find($request->id);
        if(!$bien){
            toastr()->error('Le bien n existe plus veuillez actualiser la page !');
            return back();
        }
        $bien->titre=$request->titre;
        $bien->status=$request->status;
        $bien->superficie=$request->superficie;
        $bien->prix_location=$request->prix_location;
        $bien->categorie_id=$request->categorie_id;
        $bien->proprietaire_id=$request->proprietaire_id;
        $bien->status=false;
        if($request->status==true){
            $bien->status=true;
        }

        if($request->hasFile('image')){
            $bien->image=$request->file('image')->store('bien','public');
        }
        $bien->save();
        toastr()->success("Bien immobilé Mise à jour avec success !");
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

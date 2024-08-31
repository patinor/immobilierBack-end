<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientAccount;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $clientAll=Client::paginate(10);
        return view('admin.client.listes',[
            'clientAll'=>$clientAll
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
    public function store(Request $request)
    {

        $client=new Client();
        $client->nom=$request->nom;
        $client->prenom=$request->prenom;
        $client->email=$request->email;
        $client->adresse=$request->adresse;
        $client->tel=$request->tel;
        $client->password=Hash::make($request->password);

        if($request->hasFile('piece_identite')){
            $client->piece_identite=$request->file('piece_identite')->store('piece','public');
        }

        $client->save();

        return response()->json(['message'=>'Votre compté a été ajouté avec success !']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }


    public function doLogin(Request $request){
        $client = Client::where('email', $request->emailOrTel)
                        ->orWhere('tel', $request->emailOrTel)  // Correction ici
                        ->first();
    
        if (!$client) {
            return response()->json(['message' => 'Information incorrecte']);
        }
    
        if (!Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Information incorrecte']);
        }
    
        $hash = Hash::make($client->email);
        session()->put(['token_oat' => $hash]);
        return response()->json(['message' => 'Utilisateur trouvé']);
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Administrateurs;
use App\Models\Fonctions\MatriculeAleatoire;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class AdministrateursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $administrateurs = Administrateurs::all();
        return view('administrateurs.administrateurList', [
            'administrateurs'=>$administrateurs,
        ]);
    }

    public function create()
    {
        return view('administrateurs.administrateurAdd');
    }

    public function store(Request $request)
    {
        /* $role = Role::where('name' , 'professionnelVehicule')->first();
        $role_id = $role->id;
        $user__name = $request->prenom." ".$request->nom;
        $user_name = str_replace(" ","",$user__name);
        $email = strtolower($user_name."@ecoleplus.com");
//        $password = "password";
        $user = User::create([
            'name'=> $user__name,
            'email'=> $email,
            'password'=> Hash::make("password"),
        ]); */
        $utilisateur = Utilisateurs::create([
            'nomComplet'=>$request->nomComplet,
            'sexe'=>$request->sexe,
            'email'=>$request->email,
            'adresse'=>$request->adresse,
            'numeroTelephone'=> $request->numeroTelephone,
        ]);

        $a = new MatriculeAleatoire();
        $b = $a->genererChaineAleatoire();
        $administrateur = Administrateurs::create([
            'matricule'=> 'ad'.$b,
//           'usager_id'=> $request->usager_id,
            'photo'=>$request->photo,
            'status'=>$request->status,
            'utilisateur_id'=>$utilisateur->id,
        ]);
        /*if( $administrateur ){
            Flashy::message('Administrateur created successfully !');
            return redirect()->route('administrateur.index');
        }else
        {
            Flashy::message('Administrateur not created successfully !');
            return redirect()->route('Administrateur.create');
        }*/

        //flash("Le professionnelVehicule ".$administrateur->nomComplet." "." enregistre avec cet email existe deja")->info();
//        return redirect('eleveList');
        return back();
    }

    public function edit(Administrateurs $administrateur)
    {
        $_administrateur = $administrateur;
        $t_administrateurs = Administrateurs::all();
        return view('administrateurs.administrateurEdit', compact('_administrateur','t_administrateurs'));
    }

    public function update(Administrateurs $administrateur)
    {
        $data_administrateur = request()->validate([
            'status'=> ['required'] ,
            'photo'=> ['required'] ,
        ]); $administrateur->update($data_administrateur);

        $utilisateur = Utilisateurs::where('id',$administrateur->id)->firstOrFail();
        $data_utilisateur = request()->validate([
            'nomComplet'=> ['required'] ,
            'sexe'=> ['required'] ,
            'email'=> ['required'] ,
            'adresse'=> ['required'] ,
            'numeroTelephone'=> ['required'] ,
        ]); $utilisateur->update($data_utilisateur);

        return redirect ('/administrateurList');
    }

    public function show($id)
    {
        $administrateur = Administrateurs::findOrFail($id) ;
        return view('administrateurs.administrateurShow', [
            'administrateur' => $administrateur
        ]);
    }

    public function destroy(Administrateurs $administrateur)
    {
        $administrateur->delete();
        return redirect('administrateurList');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProfessionnelVehicule;
use App\Models\Usager;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usagers = Usager::all();
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('usagers.usagerList', [
            'usagers'=>$usagers ,
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }

    public function create()
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('usagers.usagerAdd', [
            'professionnelVehicules'=>$professionnelVehicules
        ]);
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

        if (is_numeric($request->input('numeroTelephone')) && strlen($request->numeroTelephone)==9
            && ctype_alpha($request->input('nomComplet')) && strlen($request->cni)==15 && is_numeric($request->input('cni'))){
            $usager = Usager::create([
                'cni'=>$request->cni,
                'nomComplet' => ucfirst(strtolower($request->nomComplet)),
                'sexe' => $request->sexe,
                'email' => $request->email,
                'adresse' => ucfirst(strtolower($request->adresse)),
                'numeroTelephone' => $request->numeroTelephone,
            ]);
        }

        //flash("Le professionnelVehicule ".$usager->nomComplet." "." enregistre avec cet email existe deja")->info();
        //return redirect('usagerList');
        return back();
    }

    public function edit(Usager $usager)
    {
        $professionnelVehicule =$professionnelVehicules = ProfessionnelVehicule::all();
        $usagers = Usager::all();
        return view('usagers.usagerEdit', compact('usager','usagers','professionnelVehicule', 'professionnelVehicules'));
    }

    public function update(Usager $usager)
    {
        $data_usager= request()->validate([
            'nomComplet'=> ['required'] ,
            'sexe'=> ['required'] ,
            'email'=> ['required'] ,
            'adresse'=> ['required'] ,
            'status'=> ['required'] ,
            'photo'=> ['required'] ,
            'numeroTelephone'=> ['required'] ,
        ]); $usager->update($data_usager);

        return redirect ('/usagerList');
    }

    public function show($id)
    {
        $usager= Usager::findOrFail($id) ;
        return view('usagers.usagerShow', [
            'usager' => $usager
        ]);
    }

    public function destroy(Usager $usager)
    {
        $usager->delete();
        return redirect('usagerList');
    }

}

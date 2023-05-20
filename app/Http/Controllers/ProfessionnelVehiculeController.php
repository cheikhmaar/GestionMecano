<?php

namespace App\Http\Controllers;

use App\Models\Usager;
use App\Models\User;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ProfessionnelVehicule;
use App\Models\Fonctions\MatriculeAleatoire;

class ProfessionnelVehiculeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        $usagers = Usager::all();
        return view('professionnelVehicules.professionnelVehiculeList', [
            'professionnelVehicules'=>$professionnelVehicules,
            'usagers'=>$usagers,
        ]);
    }

    public function create()
    {
        $usagers = Usager::all();
        $utilisateurs = Utilisateurs::all();
        return view('professionnelVehicules.professionnelVehiculeAdd', [
            'usagers'=>$usagers,
            'utilisateurs'=>$utilisateurs,
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


        $a = new MatriculeAleatoire();
        $b = $a->genererChaineAleatoire();
        if (is_numeric($request->input('numeroTelephone')) && strlen($request->numeroTelephone)==9){
            $professionnelVehicule = ProfessionnelVehicule::create([
                'matricule' => 'Ma' . $b,
                'nomComplet' => ucfirst(strtolower($request->nomComplet)),
                'sexe' => $request->sexe,
                'email' => $request->email,
                'adresse' => ucfirst(strtolower($request->adresse)),
                'numeroTelephone' => $request->numeroTelephone,
                'status' => ucfirst(strtolower($request->status)),
                'photo' => $request->photo,
            ]);
        }

        /*if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/',$filename);
            $save=$filename;
        }else{
            $filename = 'logoPsd.png';
            $save = $filename;
        }*/

        //$professionnelVehicule = new ProfessionnelVehicule();

        //$professionnelVehicule->save();

        /*if ($photo = $request->file('photo')){
            $destinationPath = '/photos';
            $profilPhoto = date('YmHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profilPhoto);
            $input['photo'] = "$profilPhoto";
        }*/

        //flash("Le professionnelVehicule ".$professionnelVehicule->nomComplet." "." enregistre avec cet email existe deja")->info();
//        return redirect('eleveList');
          return back();
        // return redirect('professionnelVehiculeAdd');

    }

    public function edit(ProfessionnelVehicule $professionnelVehicule)
    {
        $usagers =$usagers = Usager::all();
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('professionnelVehicules.professionnelVehiculeEdit', compact('professionnelVehicule','professionnelVehicules','usagers', 'usagers'));
    }

    public function update(ProfessionnelVehicule $professionnelVehicule)
    {
        $data_professionnelVehicule= request()->validate([
            'nomComplet'=> ['required'] ,
            'sexe'=> ['required'] ,
            'email'=> ['required'] ,
            'adresse'=> ['required'] ,
            'status'=> ['required'] ,
            'photo'=> ['required'] ,
            'numeroTelephone'=> ['required'] ,
        ]); $professionnelVehicule->update($data_professionnelVehicule);

        return redirect ('/professionnelVehiculeList');
    }

    public function show($id)
    {
        $professionnelVehicule= ProfessionnelVehicule::findOrFail($id) ;
        return view('professionnelVehicules.professionnelVehiculeShow', [
            'professionnelVehicule' => $professionnelVehicule
        ]);
    }

    public function destroy(ProfessionnelVehicule $professionnelVehicule)
    {
        $professionnelVehicule->delete();
        return redirect('professionnelVehiculeList');
    }

}

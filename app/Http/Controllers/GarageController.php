<?php

namespace App\Http\Controllers;

use App\Models\Fonctions\CodeAleatoire;
use App\Models\Garage;
use App\Models\ProfessionnelVehicule;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $garages = Garage::all();
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('garages.garageList', [
            'garages'=>$garages,
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }
    public function create()
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('garages.garageAdd', [
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }

    public function store(Request $request)
    {
        $a = new CodeAleatoire();
        $b = $a->genererChaineAleatoire();

        if (is_numeric($request->input('numeroTelephone')) && strlen($request->numeroTelephone)==9){
            $garage = Garage::create([
                'codeGarage' => 'Ga'.$b,
                'numeroTelephone' => $request->numeroTelephone,
                'adresse' => ucfirst(strtolower($request->adresse)),
                'nomGarage' => ucfirst(strtolower($request->nomGarage)),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'professionnel_vehicule_id' => $request->professionnel_vehicule_id,

            ]);
        }

        return back();
    }

    public function edit(Garage $garage)
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('garages.garageEdit', [
            'garage'=>$garage,
            'professionnelVehicules'=>$professionnelVehicules

        ]);
    }

    public function update(Garage $garage)
    {
        $data_garage = request()->validate([
            //'codeGarage'=> ['required'] ,
            'numeroTelephone'=> ['required'] ,
            'adresse'=> ['required'] ,
            'nomGarage'=> ['required'] ,
            'latitude'=> ['required'] ,
            'longitude'=> ['required'] ,
            'professionnel_vehicule_id'=> ['required'] ,
        ]); $garage->update($data_garage);


        return redirect ('/garageList');
    }

    public function show($id)
    {
        $garage= Garage::findOrFail($id) ;
        return view('garages.garageShow', [
            'garage' => $garage
        ]);
    }
    public function destroy(Garage $garage)
    {
        $garage->delete();
        return redirect('garageList');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Offres;
use App\Models\ProfessionnelVehicule;
use Illuminate\Http\Request;

class OffresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $offres = Offres::all();
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('offres.offreList', [
            'offres'=>$offres,
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }
    public function create()
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('offres.offreAdd', [
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }

    public function store(Request $request)
    {
        if (is_numeric($request->input('montant')) && $request->montant>0 && ctype_alpha($request->input('commentaire'))){
            $offre = Offres::create([
                'montant'=> $request->montant,
                'commentaire'=> ucfirst(strtolower($request->commentaire)),
                'professionnel_vehicule_id'=> $request->professionnel_vehicule_id,

            ]);
        }
        /*else{
            return \Redirect::back()->withSuccess('Offres', 'Le montant de l/offre doit etre
            supeireur à 0!');
        }*/

        return back();
    }

    public function edit(Offres $offre)
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('offres.offreEdit', [
            'offre'=>$offre,
            'professionnelVehicules'=>$professionnelVehicules

        ]);
    }

    public function update(Offres $offre)
    {
        $data_offre = request()->validate([
            'montant'=> ['required'] ,
            'commentaire'=> ['required'] ,
            'professionnel_vehicule_id'=> ['required'] ,
        ]); $offre->update($data_offre);


        return redirect ('/offreList');
    }

    public function show($id)
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        $offre= Offres::findOrFail($id) ;
        return view('offres.offreShow', [
            'offre' => $offre,
            'professionnelVehicules' => $professionnelVehicules
        ]);
    }

    public function destroy(Offres $offre)
    {
        $offre->delete();
        return redirect('offreList');
    }
}

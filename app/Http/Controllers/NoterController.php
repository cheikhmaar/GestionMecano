<?php

namespace App\Http\Controllers;

use App\Models\Noter;
use App\Models\ProfessionnelVehicule;
use Illuminate\Http\Request;

class NoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $noters= Noter::all();
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('notes.noterList', [
            'noters'=>$noters,
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }
    public function create()
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('notes.noterAdd', [
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }

    public function store(Request $request)
    {
        $noter = Noter::create([
            'noter'=> $request->noter,
            'professionnel_vehicule_id'=> $request->professionnel_vehicule_id,

        ]);
        /*else{
            return $this->flash('Offres', 'Le montant de l/offre doit etre
            supeireur à 0!');

        }*/

        return back();
    }

    public function edit(Noter $noter)
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('notes.noterEdit', [
            'noter'=>$noter,
            'professionnelVehicules'=>$professionnelVehicules

        ]);
    }

    public function update(Noter $noter)
    {
        $data_noter = request()->validate([
            'noter'=> ['required'] ,
            'professionnel_vehicule_id'=> ['required'] ,
        ]); $noter->update($data_noter);


        return redirect ('/noterList');
    }

    public function show($id)
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        $noter= Noter::findOrFail($id) ;
        return view('notes.noterShow', [
            'noter' => $noter,
            'professionnelVehicules' => $professionnelVehicules
        ]);
    }

    public function destroy(Noter $noter)
    {
        $noter->delete();
        return redirect('noterList');
    }
}

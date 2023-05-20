<?php

namespace App\Http\Controllers;

use App\Models\Enrolement;
use App\Models\ProfessionnelVehicule;
use Illuminate\Http\Request;

class EnrolementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $enrolements = Enrolement::all();
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('enrolements.enrolementList', [
            'enrolements'=>$enrolements,
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }
    public function create()
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('enrolements.enrolementAdd', [
            'professionnelVehicules'=>$professionnelVehicules
        ]);
    }

    public function store(Request $request)
    {

        $enrolement = Enrolement::create([
            'registeCommerce'=> $request->registeCommerce,
            'ninea'=> $request->ninea,
            'cni'=> $request->cni,
            'professionnel_vehicule_id'=> $request->professionnel_vehicule_id,

        ]);

        return back();
    }

    public function edit(Enrolement $enrolement)
    {
        $professionnelVehicules = ProfessionnelVehicule::all();
        return view('enrolements.enrolementEdit', [
            'enrolement'=>$enrolement,
            'professionnelVehicules'=>$professionnelVehicules

        ]);
    }

    public function update(Enrolement $enrolement)
    {
        $data_enrolement = request()->validate([
            'registeCommerce'=> ['required'] ,
            'ninea'=> ['required'] ,
            'cni'=> ['required'] ,
            'professionnel_vehicule_id'=> ['required'] ,
        ]); $enrolement->update($data_enrolement);


        return redirect ('/enrolementList');
    }

    public function destroy(Enrolement $enrolement)
    {
        $enrolement->delete();
        return redirect('enrolementList');
    }
}

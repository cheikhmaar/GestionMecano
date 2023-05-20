<?php

namespace App\Http\Controllers;

use App\Models\Commanter;
use App\Models\Demande;
use App\Models\Offres;
use App\Models\TypeDemande;
use App\Models\Usager;
use Illuminate\Http\Request;

class DemandeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $demandes = Demande::all();
        //$offres = Offres::all();
        $typeDemandes = TypeDemande::all();
        $usagers = Usager::all();
        //$commanters = Commanter::all();
        return view('demandes.demandeList', [
            'demandes'=>$demandes,
            //'offres'=>$offres,
            //'typeDemandes'=>$typeDemandes,
            'usagers'=>$usagers,
            //'commanters'=>$commanters
        ]);
    }
    public function create()
    {
        $usagers = Usager::all();
        return view('demandes.demandeAdd', [
            'usagers'=>$usagers
        ]);
    }

    public function store(Request $request)
    {
        if (ctype_alpha($request->input('description'))){
            $demande = Demande::create([
                'statusDemande' => "En Cours",
                'motif' => "",
                'description' => ucfirst(strtolower($request->description)),
                'dateDemande' => $request->dateDemande,
                'service' => ucfirst(strtolower($request->service)),
                'usager_id' => $request->usager_id,

            ]);
        }

        return back();
    }

    public function edit(Demande $demande)
    {
        return view('demandes.demandeEdit', compact('demande'));
    }

    public function update(Demande $demande)
    {
        $data_demande = request()->validate([
            'statusDemande'=> ['required'] ,
            'motif'=> ['required'] ,
        ]); $demande->update($data_demande);


        return redirect ('/demandeList');
    }

    public function show($id)
    {
        $usagers = Usager::all();
        $demande= Demande::findOrFail($id);
        $typeDemandes = TypeDemande::all();
        return view('demandes.demandeShow', [
            'demande' => $demande,
            'usagers' => $usagers,
            //'typeDemandes' => $typeDemandes
        ]);
    }

    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect('demandeList');
    }}

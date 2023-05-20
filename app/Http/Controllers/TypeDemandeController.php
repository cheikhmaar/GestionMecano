<?php

namespace App\Http\Controllers;

use App\Models\TypeDemande;
use Illuminate\Http\Request;

class TypeDemandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $typeDemandes = TypeDemande::all();
        return view('typeDemandes.typeDemandeList', [
            'typeDemandes'=>$typeDemandes
        ]);
    }
}

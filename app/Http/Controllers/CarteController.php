<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function garage()
    {
        $garages = DB::table('garages')
            ->select('latitude','longitude','adresse')->get();
        return view('cartes.carte',compact('garages'));
    }

    public function fetch()
    {
        $garage = Garage::all();
        return response()->json([
            'garage' => $garage,
        ]);
    }

}

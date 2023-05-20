<?php

namespace Database\Seeders;

use App\Models\TypeDemande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeDemandeTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeDemande::create(['libelle'=>'Roue crevée']);
        TypeDemande::create(['libelle'=>'Panne de batterie']);
        TypeDemande::create(['libelle'=>'Remorquage']);
        TypeDemande::create(['libelle'=>'Vitre brisée']);
    }
}

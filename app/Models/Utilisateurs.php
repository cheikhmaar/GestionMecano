<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateurs extends Model
{
    use HasFactory;

    protected $fillable = ['nomComplet', 'sexe', 'email', 'adresse', 'numeroTelephone' ];

    public function administrateurs()
    {
        $this->hasOne(Administrateurs::class);
    }

    /*public function professionnelVehicule()
    {
        $this->hasOne(ProfessionnelVehicule::class);
    }

    public function usager()
    {
        $this->hasOne(Usager::class);
    }*/

}

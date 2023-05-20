<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usager extends Model
{
    use HasFactory;

    protected $fillable = ['cni', 'nomComplet', 'sexe', 'email', 'adresse', 'numeroTelephone' ];

    protected $table = 'usagers';

    /*public function professionnelVehicules()
    {
        return $this->belongsToMany(ProfessionnelVehicule::class);
    }*/

    public function garages()
    {
        return $this->belongsToMany(Garage::class);
    }

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateurs::class);
    }

}

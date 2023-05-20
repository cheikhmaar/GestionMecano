<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = ['codeGarage', 'numeroTelephone', 'adresse', 'nomGarage', 'latitude', 'longitude', 'professionnel_vehicule_id' ];

    protected $table = 'garages';

    public function usagers()
    {
        return $this->belongsToMany(Usager::class);
    }

    public function professionnelVehicule()
    {
        return $this->belongsTo(ProfessionnelVehicule::class);
    }

}

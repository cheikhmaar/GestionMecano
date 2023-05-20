<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offres extends Model
{
    use HasFactory;

    protected $fillable = ['montant', 'commentaire', 'professionnel_vehicule_id' ];

    protected $table = 'offres';

    /*public function demande()
    {
        return $this->hasOne(Demande::class);
    }*/

    public function professionnelVehicules()
    {
        $this->belongsTo(ProfessionnelVehicule::class);
    }

}

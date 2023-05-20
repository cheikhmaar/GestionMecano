<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionnelVehicule extends Model
{
    use HasFactory;

    protected $fillable = ['matricule', 'nomComplet', 'sexe', 'email', 'adresse', 'numeroTelephone', 'status', 'photo'];

    /*public function utilisateur()
    {
        return $this->belongsTo(Utilisateurs::class);
    }*/

    public function enrolement()
    {
        return $this->hasOne(Enrolement::class);
    }

    public function garage()
    {
        return $this->hasOne(Garage::class);
    }

    public function usagers()
    {
        return $this->belongsToMany(Usager::class);
    }

    public function offre()
    {
        return $this->hasOne(Offres::class);
    }

    public function note()
    {
        return $this->hasOne(Note::class);
    }
}

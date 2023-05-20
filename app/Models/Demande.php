<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = ['statusDemande', 'motif', 'description', 'dateDemande', 'service', 'usager_id'];

    protected $table = 'demandes';

    /*public function offre()
    {
        return $this->belongsTo(Offre::class);
    }*/

    public function typeDemandes()
    {
        return $this->belongsTo(TypeDemande::class);
    }

    public function usager()
    {
        return $this->hasOne(Usager::class);
    }

}

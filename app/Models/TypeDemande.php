<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDemande extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    protected $table = 'type_demandes';

    /*public function demande()
    {
        return $this->hasOne(Demande::class);
    }*/

}

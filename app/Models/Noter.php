<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noter extends Model
{
    use HasFactory;

    protected $fillable = ['noter', 'professionnel_vehicule_id'];

    protected $table = 'notes';

    public function professionnelVehicule()
    {
        return $this->belongsTo(ProfessionnelVehicule::class);
    }

}

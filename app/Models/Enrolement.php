<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolement extends Model
{
    use HasFactory;

    protected $fillable = ['registeCommerce', 'ninea', 'cni', 'professionnel_vehicule_id' ];

    protected $table = 'enrolements';

    public function professionnelVehicules()
    {
        return $this->belongsTo(ProfessionnelVehicule::class);
    }

}

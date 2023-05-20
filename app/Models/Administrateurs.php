<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateurs extends Model
{
    use HasFactory;

    protected $fillable = ['matricule', 'photo', 'status','utilisateur_id' ];

    protected $table = 'administrateurs';

    public function utilisateur ()
    {
        return $this->belongsTo(Utilisateurs::class);
    }

}

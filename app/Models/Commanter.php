<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commanter extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'date', 'usager_id', 'garage_id'];

    protected $table = 'commanters';
}

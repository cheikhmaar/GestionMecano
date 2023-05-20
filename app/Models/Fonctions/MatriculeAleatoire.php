<?php

namespace App\Models\Fonctions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculeAleatoire extends Model
{
    //use HasFactory;
    public function genererChaineAleatoire($longueur = 3)
    {
       // $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $caracteres = '0123456789';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
           $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
            return $chaineAleatoire;
        }
    //Utilisation de la fonction
    //echo genererChaineAleatoire();
    //echo genererChaineAleatoire(20);
}

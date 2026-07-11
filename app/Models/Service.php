<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $fillable = [
        'nom', 
        'slug', 
        'description', 
        'icone', 
        'ordre', 
        'statut', 
        'prix', 
        'prix_sur_devis',
    ];

    //prix suyr devis est un boolean, on peut le caster en boolean pour faciliter son utilisation
    protected $casts = [
        'statut' => 'boolean',
        'prix_sur_devis' => 'boolean',
    ];
}

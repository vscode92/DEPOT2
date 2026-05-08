<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    protected $fillable = [
        'Nom_fichier',
        'Type_fichier',
        'chemin',
        'taille',
        'Id_courrier',
    ];

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'Id_courrier');
    }
}

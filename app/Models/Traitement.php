<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
     protected $fillable = [
        'action',
        'commentaire',
        'Date_traitement',
        'Id_courrier',
        'Id_utilisateur',
    ];

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'Id_courrier');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'Id_utilisateur');
    }
}

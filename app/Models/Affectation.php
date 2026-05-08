<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $fillable = [
        'Date_affectation',
        'Statut',
        'Id_courrier',
        'Id_service',
        'Id_utilisateur',
    ];

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'Id_courrier');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'Id_service');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'Id_utilisateur');
    }
}

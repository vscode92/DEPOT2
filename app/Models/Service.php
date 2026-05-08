<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = [
        'Nom_service',
        'description',
    ];

    public function expediteurs()
    {
        return $this->hasMany(Expediteur::class, 'Id_service');
    }

    public function destinataires()
    {
        return $this->hasMany(Destinataire::class, 'Id_service');
    }

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'Id_service');
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'Id_service');
    }
}

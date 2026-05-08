<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'telephone_utilisateur',
        'Id_role',
        'Id_service',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'Id_utilisateur');
    }

    public function traitements()
    {
        return $this->hasMany(Traitement::class, 'Id_utilisateur');
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'Id_utilisateur');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'Id_service');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'Id_role');
    }
}

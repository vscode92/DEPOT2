<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
     protected $fillable = [
        'Numero_courrier',
        'Objet',
        'Type',
        'Date_creation',
        'Statut',
        'Id_expediteur',
        'Id_destinataire',
    ];

    public function expediteur()
    {
        return $this->belongsTo(Expediteur::class, 'Id_expediteur');
    }

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class, 'Id_destinataire');
    }

    public function archive()
    {
        return $this->hasOne(Archive::class, 'Id_courrier');
    }

    public function piecesJointes()
    {
        return $this->hasMany(PieceJointe::class, 'Id_courrier');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'Id_courrier');
    }

    public function traitements()
    {
        return $this->hasMany(Traitement::class, 'Id_courrier');
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'Id_courrier');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediteur extends Model
{
     protected $fillable = [
        'nom',
        'adresse',
        'telephone_expediteur',
        'email',
        'Id_service',
    ];

    public function courriers()
    {
        return $this->hasMany(Courrier::class, 'Id_expediteur');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'Id_service');
    }
}

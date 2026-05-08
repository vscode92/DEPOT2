<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
     protected $fillable = [
        'nom',
        'adresse',
        'telephone_destinataire',
        'email',
        'Id_service',
        
    ];

    public function courriers()
    {
        return $this->hasMany(Courrier::class, 'Id_destinataire');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'Id_service');
    }

    
}

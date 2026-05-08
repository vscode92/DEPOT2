<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'Date_archive',
        'Type_archive',
        'Id_courrier',
    ];

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'Id_courrier');
    }
}

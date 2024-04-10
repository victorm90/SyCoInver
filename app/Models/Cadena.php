<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadena extends Model
{
    use HasFactory;

    protected $fillable = ['name','detalle'];

    public function instalacion(){        
        return $this->hasMany('App\Models\Instalacion','cadena_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;

    protected $fillable = ['name','detalle'];

    public function instalacion(){        
        return $this->hasMany('App\Models\Instalacion','municipio_id', 'id');
    }
}

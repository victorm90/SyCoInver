<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function desagregacion(){        
        return $this->hasMany('App\Models\Desagregaciones','gasto_id', 'id');
    }

    public function ejecuciones(){        
        return $this->hasMany(Ejecuciones::class);
    }
}

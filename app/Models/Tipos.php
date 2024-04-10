<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;
    protected $fillable = ['name','detalle'];

    public function ejecutor(){        
        return $this->hasMany('App\Models\Tipos','tipo_id', 'id');
    }
}

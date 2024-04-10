<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoInversiones extends Model
{
    use HasFactory;

    protected $fillable = ['name','detalle'];

    public function obra(){        
        return $this->hasMany(Obra::class);    
      }
}

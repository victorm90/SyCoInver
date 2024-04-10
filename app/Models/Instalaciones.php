<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Obra;
use App\Models\Entidades;
use App\Models\Ejecutors;
use App\Models\Gastos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalaciones extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'detalle', 'municipio_id', 'cadena_id'];

    
  public function ejecucion()
  {
    return $this->hasMany(Ejecuciones::class);
    /*return $this->hasMany(Tarjeta::class);*/
  }

  public function obra()
  {
    return $this->hasMany(Obra::class);
    /*return $this->hasMany(Tarjeta::class);*/
  }

  public function municipio(){        
    return $this->belongsTo('App\Models\Municipios');
   }

  public function cadena(){        
    return $this->belongsTo('App\Models\Cadena');
   } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instalaciones;

class Entidades extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'addres', 'creeup', 'telefono', 'email', 'provincia_id'];

  //Uno a Muchos Inversa
  public function provincia()
  {
    return $this->belongsTo('App\Models\Provincia');
  }

  public function ejecucione()
  {
    return $this->hasMany(Ejecuciones::class);
    /*return $this->hasMany(Tarjeta::class);*/
  }
}

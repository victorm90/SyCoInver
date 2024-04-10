<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ejecutors;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = ['name','detalle'];


  public function ejecucione()
  {        
    return $this->belongsToMany(Ejecuciones::class,'ejecucione_servicio', 'servicio_id','id')->withTimestamps()
    ->withPivot('fecha','nfactura','costomcu','costousd');       
  }

  public function ejecutor()
  {        
    return $this->belongsToMany(Ejecutors::class,'ejecutor_servicio', 'servicio_id','id')->withTimestamps()
    ->withPivot('costomcu','costousd');       
  }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios;
use App\Models\Instalaciones;
use Carbon\Carbon;

class Ejecutors extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name','ncontrato','fecha_cont','valorhidden','fecha_ven_cont','dayoff','telefono','addres','estado','detalle','provincia_id','tipo'];


    public function diasHastaVencimiento()
    {
        return Carbon::createFromTimestamp(strtotime($this->fecha_ven_cont))->diff(Carbon::now())->days;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name']);
        // Chain fluent methods for configuration options
    }
   
    //Uno a Muchos Inversa
   public function provincia(){        
    return $this->belongsTo('App\Models\Provincia');
   }

   public function user(){        
    return $this->belongsTo('App\Models\User');
   }

   public function tipo(){        
    return $this->belongsTo('App\Models\Tipos');
   }

  /* public function servicio(){        
    return $this->belongsToMany(Servicios::class,'servicio_ejecutor', 'ejecutor_id','id');    
  } */

  public function ejecuciones(){        
    return $this->hasMany(Ejecuciones::class);    
  }

  public function servicio():BelongsToMany
    {        
      return $this->belongsToMany(Servicios::class,'ejecutor_servicio', 'ejecutor_id','servicio_id','id')->withTimestamps()
      ->withPivot('costomcu','costousd');      
    }

    public function obra():BelongsToMany
    {        
      return $this->belongsToMany(Obra::class,'ejecutor_obra', 'ejecutor_id','obra_id','id')->withTimestamps()
      ->withPivot('fecha','costomcu','costousd');      
    }
}

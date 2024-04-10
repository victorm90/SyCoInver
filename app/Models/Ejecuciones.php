<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Obra;
use App\Models\Entidades;
use App\Models\Ejecutors;
use App\Models\Gastos;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Ejecuciones extends Model
{
    use HasFactory;

    protected $fillable = ['entidade_id','instalacione_id','ejecutor_id','obra_id','gasto_id','costototal'];

    
    public function entidade()
    {        
        return $this->belongsTo(Entidades::class);
    }

    public function instalacione()
    {        
        return $this->belongsTo(Instalaciones::class);
    }
    public function ejecutor()
    {        
        return $this->belongsTo(Ejecutors::class);    
    }

    public function obra()
    {        
        return $this->belongsTo(Obra::class);    
    }

    public function gasto()
    {        
        return $this->belongsTo(Gastos::class);
    }  
    
    public function servicio():BelongsToMany
    {        
      return $this->belongsToMany(Servicios::class,'ejecucione_servicio', 'ejecucione_id','servicio_id','id')->withTimestamps()
      ->withPivot('fecha','nfactura','costomcu','costousd');      
    }

    public function desagregacion(){        
        return $this->hasMany('App\Models\Desagregaciones','instalacione_id', 'id');
    }
}

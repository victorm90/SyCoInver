<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ejecutors;
use App\Models\Entidades;
use App\Models\Obra;
use App\Models\Gastos;

class Instalacion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'descriptions'];

    
    public function entidade(){        
        return $this->belongsTo(Entidades::class);
    }
    public function ejecutor(){        
        return $this->belongsToMany(Ejecutors::class,'instalacion_ejecutor', 'instalacione_id','id');    
      }

    public function obra(){        
        return $this->belongsToMany(Obra::class,'instalacion_obra', 'instalacione_id','id');    
      }

    public function gasto(){        
        return $this->belongsTo(Gastos::class);
    }    
}

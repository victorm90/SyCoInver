<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instalaciones;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function organismo(){        
        return $this->belongsTo('App\Models\Organismos','obra_id', 'id');
        
    }

    public function desgregacione(){        
        return $this->belongsTo('App\Models\Desagrgaciones','obra_id', 'id');
        
    }

    public function empresa(){        
        return $this->belongsTo('App\Models\Empresas','obra_id', 'id');
        
    }

    public function importadore(){        
        return $this->belongsTo('App\Models\Importadores','obra_id', 'id');
        
    }

    public function instalacion(){        
        return $this->belongsTo('App\Models\Instalaciones','obra_id', 'id');
        
    }

    public function tipobra(){        
        return $this->belongsTo('App\Models\Tipobras','obra_id', 'id');
        
    }

    public function codigoinversiones(){        
        return $this->belongsTo(CodigoInversiones::class);    
      }

    public function ejecuciones(){        
        return $this->hasMany(Ejecuciones::class);    
      }

    public function ejecutor()
      {        
        return $this->belongsToMany(Ejecutors::class,'ejecutor_obra', 'ejecutor_id','obra_id','id')->withTimestamps()
        ->withPivot('fecha','costomcu','costousd');       
      }  
}

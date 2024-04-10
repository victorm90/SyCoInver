<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desagregaciones extends Model
{
    use HasFactory;

    protected $fillable = [
      'fecha',
     'costoMN' , 
     'costoUSD',
     'instalacione_id',
     'ejecutor_id', 
     'servicio_id',
     'updated_at',
      'created_at'
    ];

    public function instalacione(){        
      return $this->belongsTo(Instalaciones::class);
     }
}

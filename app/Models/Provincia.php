<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    //Uno a Muchos
    public function entidades(){        
        return $this->hasMany('App\Models\Entidades','provincia_id', 'id');
    }

    public function ejecutor(){        
        return $this->hasMany('App\Models\Ejecutors','provincia_id', 'id');
    }
}

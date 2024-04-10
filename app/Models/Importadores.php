<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importadores extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function obra(){        
        return $this->hasMany('App\Models\Obra','importadore_id', 'id');
    }
}

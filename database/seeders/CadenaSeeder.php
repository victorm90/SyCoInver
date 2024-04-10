<?php

namespace Database\Seeders;

use App\Models\Cadena;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadenaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cadena::create(['name'=>'ISLAZUL ' ]); 
        Cadena::create(['name'=>'CUBANACAN ' ]); 
        Cadena::create(['name'=>'PALMARES ' ]); 
        Cadena::create(['name'=>'GAVIOTA ' ]); 
    }
}

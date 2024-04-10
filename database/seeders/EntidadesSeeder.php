<?php

namespace Database\Seeders;

use App\Models\Entidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entidades::create([
            'name'=>'UEB INMOBILIARIA DEL TURISMO EN GUANTANAMO',
            'addres'=>'14 NORTE / 2 Y 3 OESTE',
            'creeup'=>'10400', 
            'telefono'=>'21351258',
            'email'=>'comercial@inmobiliaria.gto.tur.cu',           
            'provincia_id'=>'1'         

        ]);
    }
}

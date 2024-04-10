<?php

namespace Database\Seeders;

use App\Models\Municipios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipios::create(['name'=>'Baracoa' ]);        
        Municipios::create(['name'=>'Caimanera' ]);
        Municipios::create(['name'=>'El Salvador' ]);
        Municipios::create(['name'=>'Guantánamo' ]);
        Municipios::create(['name'=>'Imias' ]);
        Municipios::create(['name'=>'Maisi' ]);              
    }
}

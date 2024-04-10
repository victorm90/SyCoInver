<?php

namespace Database\Seeders;

use App\Models\Servicios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicios::create(['name'=>'ALIMENTACION' ]);        
        Servicios::create(['name'=>'TRANSPORTACION ' ]);
        Servicios::create(['name'=>'equipos' ]);
        Servicios::create(['name'=>'Demolicones' ]);
        Servicios::create(['name'=>'Carpinteria' ]);
        Servicios::create(['name'=>'ALBAÑILERIA' ]);
        Servicios::create(['name'=>' PINTURA' ]);
        Servicios::create(['name'=>' Electricidad' ]);
        Servicios::create(['name'=>'Desmontes' ]);
        Servicios::create(['name'=>'Colocacion de piso' ]);
        Servicios::create(['name'=>'Instalaciones sanitarias' ]);
    }
}

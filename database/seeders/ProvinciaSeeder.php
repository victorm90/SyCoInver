<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provincia::create(['name'=>'Guantanamo' ]);
        Provincia::create(['name'=>'Granma' ]);
        Provincia::create(['name'=>'Holguin' ]);
        Provincia::create(['name'=>'Santiago de Cuba' ]);
        Provincia::create(['name'=>'Artemisa' ]);
        Provincia::create(['name'=>'Mayabeque' ]);
        Provincia::create(['name'=>'Pinar del Rio' ]);
        Provincia::create(['name'=>'Isla de la Juventud' ]);
        Provincia::create(['name'=>'Matanzas' ]);
        Provincia::create(['name'=>'Camaguey' ]);
        Provincia::create(['name'=>'Las Tunas' ]);
        Provincia::create(['name'=>'Santi Spiritus' ]);
    }
}

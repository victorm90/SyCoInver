<?php

namespace Database\Seeders;

use App\Models\Importadores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImportadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Importadores::create(['name'=>'GELECT' ]);
        Importadores::create(['name'=>'ITH' ]);
        Importadores::create(['name'=>'SEISA' ]);
    }
}

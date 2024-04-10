<?php

namespace Database\Seeders;

use App\Models\Organismos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganismosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organismos::create(['name'=>'GELECT' ]);
        Organismos::create(['name'=>'SRL' ]);
        Organismos::create(['name'=>'SERVITUR' ]);
    }
}

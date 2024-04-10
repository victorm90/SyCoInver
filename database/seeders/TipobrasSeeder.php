<?php

namespace Database\Seeders;

use App\Models\Tipobras;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipobrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tipobras::create(['name'=>'Nueva' ]);
        Tipobras::create(['name'=>'Continuidad ' ]); 
        Tipobras::create(['name'=>'Mejoras' ]);
        Tipobras::create(['name'=>'Remodelación ' ]); 
        Tipobras::create(['name'=>'Recontrucción ' ]);         
    }
}

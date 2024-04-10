<?php

namespace Database\Seeders;

use App\Models\CodigoInversiones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodigoInversionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CodigoInversiones::create(['name'=>'Nominales ' ]); 
        CodigoInversiones::create(['name'=>'No Nominales ' ]); 
    }
}

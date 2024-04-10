<?php

namespace Database\Seeders;

use App\Models\Empresas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresas::create(['name'=>'SEISA' ]);
        Empresas::create(['name'=>'MIPYME' ]);
        Empresas::create(['name'=>'EMPRESTUR' ]);
        Empresas::create(['name'=>'INMOTUR' ]);
        
    }
}

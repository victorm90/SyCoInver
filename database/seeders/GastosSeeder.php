<?php

namespace Database\Seeders;

use App\Models\Gastos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GastosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gastos::create(['name'=>'CONTRUCCION Y MONTAJE' ]);
        Gastos::create(['name'=>'CONS MONTAJE + SALARIO' ]);
        Gastos::create(['name'=>'SALARIO' ]);
        Gastos::create(['name'=>'EQUIPOS' ]);
        Gastos::create(['name'=>'OTROS' ]);
        Gastos::create(['name'=>'CAPITAL DE TRABAJO' ]);
        Gastos::create(['name'=>'OTROS + CAPIT TRABAJ' ]);
        Gastos::create(['name'=>' PINTURA' ]);
        Gastos::create(['name'=>' P.A.P' ]);       
    }
}

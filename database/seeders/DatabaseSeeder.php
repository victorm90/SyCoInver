<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cadena;
use App\Models\CodigoInversiones;
use App\Models\Ejecutors;
use App\Models\Empresas;
use App\Models\Entidades;
use App\Models\Gastos;
use App\Models\Importadores;
use App\Models\Instalacion;
use App\Models\Municipios;
use App\Models\Obra;
use App\Models\Organismos;
use App\Models\Provincia;
use App\Models\Servicios;
use App\Models\Tipobras;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(EntidadesSeeder::class);       
        $this->call(ServiciosSeeder::class);
        $this->call(GastosSeeder::class);
        $this->call(ImportadoresSeeder::class);
        $this->call(OrganismosSeeder::class);
        $this->call(EmpresasSeeder::class);        
        $this->call(TipobrasSeeder::class);
        $this->call(CodigoInversionesSeeder::class);
        $this->call(CadenaSeeder::class);
        $this->call(MunicipiosSeeder::class);
    }
}

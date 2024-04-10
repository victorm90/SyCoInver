<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Victor Manuel Henriquez Olivera ',
            'usuario'=>'victorm.henriquez',
            'ci'=>'900224479',
            'addres'=>'norte',
            'email'=>'victorm.henriquez@gmail.com',
            'password'=>bcrypt('12345678')

        ])->assignRole('Admin');

        User::create([
            'name'=>'Thiao Hernandez ',
            'usuario'=>'thiao.hernandez',
            'ci'=>'900224479',
            'addres'=>'sur',
            'email'=>'thiao.hernandez@gmail.com',
            'password'=>bcrypt('12345678')

        ])->assignRole('Comercial');

        /* User::factory(30)->create(); */
    }
}

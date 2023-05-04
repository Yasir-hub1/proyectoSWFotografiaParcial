<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Moira Lozano',
            'email'=> 'moiralo12@gmail.com',
            'password'=> bcrypt('moira123456')
        ])->assignRole('organizador');

        User::create([
            'name'=> 'Moirano',
            'email'=> 'Moirano12@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('organizador');

        User::create([
            'name'=> 'Karla Lozano',
            'email'=> 'karla@gmail.com',
            'password'=> bcrypt('karla123456')
        ])->assignRole('fotografo');

        User::create([
            'name'=> 'Luis Perez',
            'email'=> 'Luis@gmail.com',
            'password'=> bcrypt('Luis123456')
        ])->assignRole('cliente');

    }
}

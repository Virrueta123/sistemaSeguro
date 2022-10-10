<?php

namespace Database\Seeders;

use App\Models\Propietario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(1)->create();
        for ($i=0; $i < 200; $i++) { 
            Propietario::factory(1)->create();
        }
        
    }
}

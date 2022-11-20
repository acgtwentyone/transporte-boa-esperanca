<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => config("custom.SUPER_ADMIN_USERNAME"),
            //     'email' => config("custom.SUPER_ADMIN_EMAIL"),
            //     'password' => Hash::make(config("custom.SUPER_ADMIN_PASSWORD")),
            // ]);
        // add some dummy users
        // \App\Models\User::factory(3)->create();

        // \App\Models\Client::factory(10)->create();
        // \App\Models\Work::factory(10)->create();
        // \App\Models\Invoice::factory(3)->create();
        // \App\Models\Fuel::factory(5)->create();
    }
}

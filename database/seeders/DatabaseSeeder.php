<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([  //Admin
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin123')
        ]);

        User::create([  //Operator
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'role' => 'operator',
            'password' => bcrypt('operator')
        ]);
    }
}

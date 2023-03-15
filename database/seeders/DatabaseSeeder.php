<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([  //Admin
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::create([  //Admin
            'name' => 'Admin Dua',
            'email' => 'admin2@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::create([  //Admin
            'name' => 'Admin Tiga',
            'email' => 'admin3@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::create([  //Operator
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'role' => 'operator',
            'password' => bcrypt('password')
        ]);

        \App\Models\User::create([  //Operator
            'name' => 'Petugas Dua',
            'email' => 'petugas2@gmail.com',
            'role' => 'operator',
            'password' => bcrypt('password')
        ]);
        \App\Models\User::create([  //Operator
            'name' => 'Petugas Tiga',
            'email' => 'petugas3@gmail.com',
            'role' => 'operator',
            'password' => bcrypt('password')
        ]);
    }
}

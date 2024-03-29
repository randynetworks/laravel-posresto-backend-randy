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
         \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@test.dev',
            'password' => \Hash::make('12345678')
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}

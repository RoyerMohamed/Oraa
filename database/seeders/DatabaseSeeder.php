<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class); 
        $this->call(ProjetSeeder::class);
        $this->call(BoardSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(TacheSeeder::class);
        $this->call(SoustacheSeeder::class);
    }
}

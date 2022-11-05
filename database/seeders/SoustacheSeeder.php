<?php

namespace Database\Seeders;

use App\Models\SousTache;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoustacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       SousTache::factory()->times(500)->create(); 
    }
}

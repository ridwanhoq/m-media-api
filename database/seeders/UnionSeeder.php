<?php

namespace Database\Seeders;

use App\Models\Union;
use Illuminate\Database\Seeder;

class UnionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Union::factory()->count(50)->create();
    }
}

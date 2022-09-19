<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"      => "user",
            "name_bn"   => "ব্যবহারকারী",
            "email"     => "admin@admin.com",
            "password"  => Hash::make("1234")
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id"   => (new DbService)->randomOrCreate(User::class)->id
        ];
    }
}

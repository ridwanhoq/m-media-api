<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\Upazila;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'upazila_id'    => (new DbService)->randomOrCreate(Upazila::class)->id,
            'name'          => $this->faker->word(),
            'name_bn'       => $this->faker->word(),
        ];
    }
}

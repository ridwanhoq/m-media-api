<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'division_id'   => (new DbService)->randomOrCreate(Division::class)->id,
            'name'          => $this->faker->word(),
            'name_bn'       => $this->faker->word(),
        ];
    }
}

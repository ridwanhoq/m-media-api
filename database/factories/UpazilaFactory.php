<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

class UpazilaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'district_id'   => (new DbService)->randomOrCreate(District::class)->id,
            'name'          => $this->faker->word(),
            'name_bn'       => $this->faker->word(),
        ];
    }
}

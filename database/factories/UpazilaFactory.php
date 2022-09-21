<?php

namespace Database\Factories;

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
            'district_id'   => District::pluck('id')->random(),
            'name'          => $this->faker->word(),
            'name_bn'       => $this->faker->word(),
        ];
    }
}

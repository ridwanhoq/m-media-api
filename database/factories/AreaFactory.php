<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\Union;
use Illuminate\Database\Eloquent\Factories\Factory;

class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'union_id'      => (new DbService)->randomOrCreate(Union::class)->id,
            'name'          => $this->faker->word(),
            'name_bn'       => $this->faker->word(),
        ];
    }
}

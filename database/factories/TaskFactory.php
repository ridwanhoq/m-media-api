<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'   => Category::pluck('id')->random(),
            'title_en'      => $this->faker->unique()->uuid(),
            'title_bn'      => $this->faker->unique()->uuid()
        ];
    }
}

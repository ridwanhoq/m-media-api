<?php

namespace Database\Factories;

use App\Models\SkillSpeciality;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillSubSpecialityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'skill_speciality_id'   => SkillSpeciality::factory()->create()->id,
            'title'                 => $this->faker->unique()->uuid()
        ];
    }
}

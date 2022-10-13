<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\SkillSpeciality;
use App\Models\SkillSubSpeciality;
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
            'skill_speciality_id'   => (new DbService)->randomOrCreate(SkillSubSpeciality::class)->id,
            'title'                 => $this->faker->unique()->uuid()
        ];
    }
}

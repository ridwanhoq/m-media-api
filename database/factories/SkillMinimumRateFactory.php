<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillMinimumRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'skill_id'      => (new DbService)->randomOrCreate(Skill::class)->id
        ];
    }
}

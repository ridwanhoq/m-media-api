<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\SkillSpeciality;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSkillSpecialityScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $db_service = (new DbService);
        return [
            'user_id'               => $db_service->randomOrCreate(User::class)->id,
            'skill_speciality_id'   => $db_service->randomOrCreate(SkillSpeciality::class)->id
        ];
    }
}

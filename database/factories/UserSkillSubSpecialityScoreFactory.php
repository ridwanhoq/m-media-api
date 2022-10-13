<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\SkillSubSpeciality;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSkillSubSpecialityScoreFactory extends Factory
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
            'user_id'                   => $db_service->randomOrCreate(User::class)->id,
            'skill_sub_speciality_id'   => $db_service->randomOrCreate(SkillSubSpeciality::class)->id
        ];
    }
}

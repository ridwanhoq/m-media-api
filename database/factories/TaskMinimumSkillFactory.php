<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\Skill;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskMinimumSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $db_service     = new DbService;

        return [
            "task_id"       => $db_service->randomOrCreate(Task::class)->id,
            "skill_id"      => $db_service->randomOrCreate(Skill::class)
        ];
    }
}

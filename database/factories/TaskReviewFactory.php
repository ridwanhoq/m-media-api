<?php

namespace Database\Factories;

use App\Http\Components\Services\DbService;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "task_id"   => (new DbService)->randomOrCreate(Task::class)
        ];
    }
}

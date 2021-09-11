<?php

namespace Database\Factories;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use Domain\Project\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'status' => Arr::random([
                Task::STATUS_OPEN,
                Task::STATUS_IN_PROGRESS,
                Task::STATUS_REVIEWED,
                Task::STATUS_CLOSED,
            ]),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'estimate_time' => null,
            'due_at' => null,
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
        ];
    }
}

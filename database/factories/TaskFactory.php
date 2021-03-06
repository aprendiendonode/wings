<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Domain\Task\Models\Task;
use Domain\Task\States\Open;
use Domain\User\Models\User;
use Domain\Task\States\Closed;
use Domain\Task\States\Reviewed;
use Domain\Project\Models\Project;
use Domain\Task\States\InProgress;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'status' => Arr::random([
                Open::CODE,
                InProgress::CODE,
                Reviewed::CODE,
                Closed::CODE,
            ]),
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'estimate_time' => null,
            'due_at' => null,
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
        ];
    }

    public function isOpen(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Open::CODE,
            ];
        });
    }

    public function isInProgress(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => InProgress::CODE,
            ];
        });
    }

    public function isReviewed(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Reviewed::CODE,
            ];
        });
    }

    public function isClosed(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Closed::CODE,
            ];
        });
    }

    public function isDue(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'due_at' => now()->subHour(),
            ];
        });
    }

    public function isNotDue(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'due_at' => now()->addHour(),
            ];
        });
    }
}

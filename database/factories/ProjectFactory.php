<?php

namespace Database\Factories;

use Domain\Project\Models\Project;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'estimate_time' => null,
            'due_at' => null,
            'user_id' => User::factory(),
            'project_id' => null,
        ];
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

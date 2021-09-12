<?php

namespace Database\Factories;

use Domain\Task\Models\Task;
use Domain\Time\Models\Time;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{
    protected $model = Time::class;

    public function definition(): array
    {
        return [
            'start_at' => now(),
            'end_at' => now()->addHours(1),
            'time' => 60,
            'task_id' => Task::factory(),
            'user_id' => User::factory(),
        ];
    }

    public function ofTwoHours(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'start_at' => now(),
                'end_at' => now()->addHours(2),
            ];
        });
    }
}

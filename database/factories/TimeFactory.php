<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Time;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{
    protected $model = Time::class;

    public function definition(): array
    {
        return [
            'start_at' => now(),
            'end_at' => now()->addHours(2),
            'time' => 120,
            'task_id' => Task::factory(),
            'user_id' => User::factory(),
        ];
    }
}

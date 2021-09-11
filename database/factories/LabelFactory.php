<?php

namespace Database\Factories;

use Domain\User\Models\User;
use Domain\Label\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;

class LabelFactory extends Factory
{
    protected $model = Label::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'color' => 'black',
            'user_id' => User::factory(),
        ];
    }
}

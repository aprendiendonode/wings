<?php

namespace Database\Factories;

use Domain\User\Models\User;
use Domain\Label\Models\Label;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class LabelFactory extends Factory
{
    protected $model = Label::class;

    public function definition(): array
    {
        $color = Arr::random(Label::COLORS);

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'foreground_color' => $color['foreground'],
            'background_color' => $color['background'],
            'user_id' => User::factory(),
        ];
    }
}

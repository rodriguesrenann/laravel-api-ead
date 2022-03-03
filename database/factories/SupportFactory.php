<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{

    protected $model = Support::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_id' => Lesson::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->title(),
            'description' => $this->faker->sentence(),
            'status' => 'A'
        ];
    }
}

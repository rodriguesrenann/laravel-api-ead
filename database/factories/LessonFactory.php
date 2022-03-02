<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{

    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();

        return [
            'module_id' => Module::factory(),
            'name' => $name,
            'description' => $this->faker->sentence(),
            'url' => Str::slug($name),
            'video' => Str::random(),
        ];
    }
}

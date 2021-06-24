<?php

namespace Database\Factories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Submission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            // 'presenter' => $this->faker->title($gender) . ' ' .  $this->faker->name(),
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['Oral Presentation', 'Poster Presentation']),
        ];
    }
}

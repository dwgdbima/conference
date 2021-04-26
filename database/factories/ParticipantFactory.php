<?php

namespace Database\Factories;

use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Participant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'salutation' => $this->faker->title($gender),
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName(),
            'birth_of_date' => $this->faker->date(),
            'gender' => $gender,
            'institution' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber(),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'participation' => $this->faker->randomElement(['presenter', 'non-presenter']),
            'research' => $this->faker->sentence(),
            'photo' => 'profile-default.jpg',
        ];
    }
}

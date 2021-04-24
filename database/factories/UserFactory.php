<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'email' => preg_replace('/@example\..*/', '@gmail.com', $this->faker->unique()->safeEmail()),
            'email_verified_at' => now(),
            'photo' => 'default.jpg',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

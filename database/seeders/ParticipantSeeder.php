<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participant = Role::where('name', 'participant')->first();

        User::factory()
            ->has(Participant::factory()->count(1))
            ->count(10)
            ->state(new Sequence(
                fn () => ['role_id' => $participant],
            ))
            ->create();

        $user = $participant->users()->create([
            'email' => 'dewagedebima@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'active' => 1,
        ]);

        $user->participant()->create([
            'salutation' => 'Dr.',
            'first_name' => 'Dewa Gede',
            'last_name' => 'Bima Prabawa',
            'birth_of_date' => '1997-08-10',
            'gender' => 'male',
            'institution' => 'AMIKOM',
            'phone' => '082266563995',
            'street' => 'BR. Triwangsa, Tegallalang, Tegallalang',
            'city' => 'Gianyar',
            'country' => 'Indonesia',
            'photo' => 'dist/img/profile-default.jpg',
            'participation' => 'presenter',
            'research' => 'Artificial Intelegent',
        ]);
    }
}

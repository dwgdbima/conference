<?php

namespace Database\Seeders;

use App\Models\Reviewer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ReviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(Reviewer::factory()->count(1))
            ->count(10)
            ->state(new Sequence(
                fn () => ['role_id' => Role::where('name', 'reviewer')->first()],
            ))
            ->create();
    }
}

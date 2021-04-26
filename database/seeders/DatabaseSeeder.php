<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Reviewer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::factory()
            ->has(
                User::factory()
                    ->count(1)
                    ->state(['email' => 'admin@admin.com'])
            )
            ->create([
                'name' => 'admin'
            ]);

        $participants = Role::factory()
            ->has(User::factory()
                ->has(Participant::factory()->count(1))
                ->count(10))
            ->create([
                'name' => 'participant'
            ]);

        $reviewer = Role::factory()
            ->has(User::factory()
                ->has(Reviewer::factory()->count(1))
                ->count(5))
            ->create([
                'name' => 'reviewer'
            ]);
    }
}

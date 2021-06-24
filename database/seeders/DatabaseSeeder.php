<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            TopicSeeder::class,
            ParticipantSeeder::class,
            ReviewerSeeder::class,
            SubmissionSeeder::class,
            AbstractSeeder::class,
            PaperSeeder::class,
            ReviewAbstractSeeder::class,
            ReviewPaperSeeder::class,
        ]);
    }
}

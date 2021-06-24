<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Submission;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submission::factory()
            ->count(20)
            ->state(new Sequence(
                fn () => [
                    'participant_id' => $participant = Participant::all()->random(),
                    'presenter' => $participant->salutation . ' ' . $participant->first_name . ' ' . $participant->last_name,
                    'topic_id' => Topic::all()->random(),
                ],
            ))
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AbstractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $submissions = Submission::all();

        foreach ($submissions as $submission) {
            $submission->abstract()->create([
                'file' => Str::random() . '.pdf'
            ]);
        }
    }
}

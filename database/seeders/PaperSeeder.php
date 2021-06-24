<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
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
            $submission->paper()->create([
                'file' => Str::random() . '.pdf'
            ]);
        }
    }
}

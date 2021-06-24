<?php

namespace Database\Seeders;

use App\Models\Paper;
use App\Models\Reviewer;
use Illuminate\Database\Seeder;

class ReviewPaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $papers = Paper::all();

        foreach ($papers as $paper) {
            $paper->reviewPaper()->create([
                'reviewer_id' => Reviewer::all()->random()->id,
            ]);
        }
    }
}

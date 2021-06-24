<?php

namespace Database\Seeders;

use App\Models\Abstractt;
use App\Models\Reviewer;
use Illuminate\Database\Seeder;

class ReviewAbstractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abstracts = Abstractt::all();

        foreach ($abstracts as $abstract) {
            $abstract->reviewAbstract()->create([
                'reviewer_id' => Reviewer::all()->random()->id
            ]);
        }
    }
}

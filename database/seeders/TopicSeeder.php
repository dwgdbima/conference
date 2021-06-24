<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            [
                'name' => 'Petroleum and Geothermal Engineering'
            ],
            [
                'name' => 'Disaster Management and Environmental Issues'
            ],
            [
                'name' => 'Geology'
            ],
            [
                'name' => 'Geophysics, Geomatics and Geochemistry'
            ],
            [
                'name' => 'Mining and Metallugry Engineering'
            ],
        ];

        foreach ($topics as $topic) {
            Topic::create($topic);
        }
    }
}

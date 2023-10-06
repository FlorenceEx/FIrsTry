<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $episodes, object $course): void
    {
        Episode::factory()->count($episodes)->create(['course_id' => $course->id]);
    }
}

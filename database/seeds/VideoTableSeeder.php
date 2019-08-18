<?php

use Illuminate\Database\Seeder;
use App\Video;
class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Video::class, 250)->create();
    }
}

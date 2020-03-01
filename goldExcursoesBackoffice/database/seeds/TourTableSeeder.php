<?php

use Illuminate\Database\Seeder;
use App\Models\Tour;
class TourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tour::class, 50)->create();
    }
}

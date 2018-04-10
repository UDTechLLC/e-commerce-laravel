<?php

use Illuminate\Database\Seeder;

class TimerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Timer::class)->create();
    }
}

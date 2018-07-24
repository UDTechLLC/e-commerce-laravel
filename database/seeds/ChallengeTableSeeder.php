<?php

use Illuminate\Database\Seeder;
use App\Models\Challenge;

class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenge = factory(Challenge::class)->create([
           'title' => 'Spring Challenge'
        ]);

        $pathToFile = 'resources/assets/web/seed_challenges/Spring Challenge_icon.jpg';
        $challenge->addMedia($pathToFile)->preservingOriginal()->toMediaCollection('preview');
    }
}

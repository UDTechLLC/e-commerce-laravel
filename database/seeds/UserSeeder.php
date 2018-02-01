<?php

use Illuminate\Database\Seeder,
    App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create();

        $user->attachRole(1);
    }
}

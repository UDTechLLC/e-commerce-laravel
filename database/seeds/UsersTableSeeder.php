<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 100)->create();
        $user = factory(\App\Models\User::class)->create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456')
        ]);
        $user->attachRole(2);
    }
}

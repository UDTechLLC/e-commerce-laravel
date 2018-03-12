<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'email'    => 'admin@mail.com',
            'password' => bcrypt("123456")
        ]);

        $user->attachRole(2);

        $user = factory(User::class)->create([
            'email'    => 'ceo@shedyourfat.com',
            'password' =>  bcrypt('5Htsfoi435')
        ]);
        $user->attachRole(2);
        factory(User::class, 10)->create();
    }
}

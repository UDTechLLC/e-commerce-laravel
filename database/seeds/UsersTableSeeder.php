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
        factory(User::class, 10)->create();
        factory(User::class)->create([
            'email'    => 'admin@mail.com',
            'password' => bcrypt("123456")
        ]);
    }
}

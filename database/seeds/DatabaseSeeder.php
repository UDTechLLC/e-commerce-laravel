<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(TimerTableSeeder::class);
        $this->call(ChallengeSeeder::class);
        $this->call(ChallengeTableSeeder::class);
        $this->call(ShippingTableSeeder::class);
        $this->call(CMSHomePageTableSeeder::class);
        $this->call(SocialProductSeeder::class);
        $this->call(UpSaleProductSeeder::class);
    }
}

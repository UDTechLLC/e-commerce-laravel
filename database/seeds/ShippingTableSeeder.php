<?php

use Illuminate\Database\Seeder;
use App\Models\Shipping;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Shipping::class)->create();

        factory(Shipping::class)->create([
            'country' => Shipping::OTHER,
            'cost'    => 17.99
        ]);
    }
}

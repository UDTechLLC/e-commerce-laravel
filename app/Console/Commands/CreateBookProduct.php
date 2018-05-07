<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class CreateBookProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:createBook {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $product = Product::find($this->argument('id'));

        $pathToPdfFile = 'resources/assets/web/seed_products/pdf/what_to_eat_in_the_streets.pdf';
        $product->addMedia($pathToPdfFile)->preservingOriginal()->toMediaCollection('download');
    }
}

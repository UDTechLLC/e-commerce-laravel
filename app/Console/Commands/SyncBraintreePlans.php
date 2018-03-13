<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Console\Command;

class SyncBraintreePlans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'braintree:sync-plans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync with online plans on Braintree';

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
        $braintreePlans = \Braintree_Plan::all();

        foreach ($braintreePlans as $braintreePlan) {
            Plan::updateOrCreate(['braintree_plan' => $braintreePlan->id], [
                'name'           => $braintreePlan->name,
                'slug'           => str_slug($braintreePlan->name),
                'braintree_plan' => $braintreePlan->id,
                'cost'           => $braintreePlan->price,
                'description'    => $braintreePlan->description,
            ]);
        }
    }
}

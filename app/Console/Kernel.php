<?php

namespace App\Console;

use App\Console\Commands\CreateNextSubscriptionBillingCycle;
use App\Console\Commands\Database\Create;
use App\Console\Commands\SyncBraintreePlans;
use App\Console\Commands\UpdateShipstationOrders;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SyncBraintreePlans::class,
        UpdateShipstationOrders::class,
        CreateNextSubscriptionBillingCycle::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(CreateNextSubscriptionBillingCycle::class)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

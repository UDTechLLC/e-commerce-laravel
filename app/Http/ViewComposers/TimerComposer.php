<?php

namespace App\Http\ViewComposers;

use App\Models\Timer;
use Illuminate\View\View;

class TimerComposer
{
    /**
     * The user repository implementation.
     *
     * @var Timer
     */
    protected $timer;

    /**
     * Create a new profile composer.
     *
     * @param  Timer  $timer
     * @return void
     */
    public function __construct(Timer $timer)
    {
        // Dependencies automatically resolved by service container...
        $this->timer = Timer::first();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('timer', $this->timer);
    }
}

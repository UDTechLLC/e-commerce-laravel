<?php
declare (strict_types = 1);

namespace App\Http\Controllers\Admin;

use App\Models\Timer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class TimerController
 * @package App\Http\Controllers\Admin
 */
class TimerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.timer.edit', [
            'timer' => Timer::first()
        ]);
    }

    /**
     * @param Request $request
     * @param Timer $timer
     */
    public function update(Request $request, Timer $timer)
    {
        $timer->update($request->all());
    }
}

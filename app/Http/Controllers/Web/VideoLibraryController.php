<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoLibraryController extends Controller
{
    public function awayToWp()
    {
        return redirect()->away('https://shedyourfatnow.com/videolibrary/legs-fire-downloads/');
    }
}

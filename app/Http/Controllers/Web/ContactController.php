<?php

namespace App\Http\Controllers\Web;

use App\Mail\ContactSent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{

    protected $redirectTo = 'home';


    public function index(): View
    {
        return view('web.page.contact');
    }

    /**
     * Send contact email.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function sendContactToEmail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $massage = $request->massage;
        $subject = $request->subject;

        Mail::to('info@shedyourfat.com')->send(new ContactSent($name, $email, $massage, $subject));

        return $this->redirectTo = view('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;


class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing_page.index');
    }

    public function sendGuestMail(Request $request)
    {
        Mail::to('rrizkyyki@gmail.com')->send(
            new OrderMail(
                $request->name, 
                $request->email, 
                $request->message,
            ));
        return redirect()->back()->with('success', 'Email berhasil dikirim.');
    }
}

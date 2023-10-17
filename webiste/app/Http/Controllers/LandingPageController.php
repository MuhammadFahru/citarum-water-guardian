<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function beranda()
    {
        return view('landing.beranda');
    }

    public function monitoring()
    {
        return view('landing.monitoring');
    }

    public function feedback(Request $request)
    {
        $fedback = new Feedback();
        $fedback->name = $request->name;
        $fedback->email = $request->email;
        $fedback->subject = $request->subject;
        $fedback->message = $request->message;
        $status = $fedback->save();

        if ($status) {
            return redirect()->back()->with('success', 'Feedback berhasil dikirim!');
        } else {
            return redirect()->back()->with('error', 'Feedback tidak berhasil dikirim!');
        }
    }
}

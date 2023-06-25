<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicLandingController extends Controller
{
    //

    public function landing()
    {
        return view('landing.index');
    }
}

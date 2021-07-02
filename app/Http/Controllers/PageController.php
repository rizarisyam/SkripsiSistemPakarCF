<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function informasi() {

        if (auth()->user()->role =! "user") {
            return view('pages.informasi');
        } 
        return view('user.informasi');
    }

    function petunjuk() {
        if (auth()->user()->role =! "user") {
            return view('pages.petunjuk');
            
        } else {
            return view('user.petunjuk');
        }
    }
}

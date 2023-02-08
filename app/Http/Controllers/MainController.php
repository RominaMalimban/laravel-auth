<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{   
    // HOME PUBLIC:
    public function home(){
        return view('pages.home');
    }

    // LOGGED PRIVATE:
    public function logged(){
        return view('pages.logged');
    }
}

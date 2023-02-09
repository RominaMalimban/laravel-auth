<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class MainController extends Controller
{   
    // HOME PUBLIC:
    public function home(){

        $projects = Project::all();

        return view('pages.home', compact('projects'));
    }

    // LOGGED PRIVATE:
    public function logged(){
        return view('pages.logged');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class MainController extends Controller
{   
    // HOME PUBLIC:
    public function home(){

        $projects = Project::all();

        return view('pages.home',compact('projects'));
    }

    // LOGGED PRIVATE:
    public function logged(){

        $projects = Project::all();

        return view('pages.logged',compact('projects'));
    }

    // METODO SHOW PUBLIC:
    public function projectShow(Project $project){
        return view('pages.projectShow', compact('project'));
    }

    // METODO DELETE PRIVATE:
    public function projectDelete(Project $project) {

        $project -> delete();
    
        return redirect() -> route('home', 'logged');
    }
    
}

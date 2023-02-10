<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
class MainController extends Controller
{   
    // METODO HOME PUBLIC:
    public function home(){

        $projects = Project::orderBy('created_at', 'DESC')->get();

        return view('pages.home',compact('projects'));
    }

    // METODO LOGGED PRIVATE:
    public function logged(){

        $projects = Project::orderBy('created_at', 'DESC')->get();

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

    // METODO PER FORM:
    public function projectCreate() {

        return view('pages.projectCreate');
    }

    //  METODO PER RICEZIONE DATI DA FORM CON VALIDAZIONE:
    public function projectStore(Request $request) {

        $data = $request->validate([
                'name' => 'required|string|max:64|unique:projects,name',
                'description' => 'nullable|string',
                'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|unique:projects,main_image',
                'release_date' => 'required|before:'.now(),
                'repo_link' => 'required|unique:projects,repo_link'
            ]
        );

        $img_path = Storage::put('uploads', $data['main_image']);
        $data['main_image'] = $img_path;

        $project = new Project();
    
        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];

        $project -> save();
    
        return redirect() -> route('home','logged');
    }

    // METODO EDIT:
    public function projectEdit(Project $project) {

        return view('pages.projectEdit', compact('project'));
    }

    // METODO PER RICEZIONE DATI VECCHI DA FORM CON VALIDAZIONE:
    public function projectUpdate(Request $request, Project $project) {

        $data = $request->validate([
                'name' => 'required|string|max:64',
                'description' => 'nullable|string',
                'main_image' => 'required|string',
                'release_date' => 'required|before:'.now(),
                'repo_link' => 'required'
            ]
        );

        $project -> name = $data['name'];
        $project -> description = $data['description'];
        $project -> main_image = $data['main_image'];
        $project -> release_date = $data['release_date'];
        $project -> repo_link = $data['repo_link'];

        $project -> save();
    
        return redirect() -> route('home','logged');
    }
}

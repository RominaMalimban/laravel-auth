@extends('layouts.main-layout')

@section('content')
    
    {{-- svg onda --}}
    <svg class="myWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path  fill="#efd6b0" fill-opacity="1" 
            d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,240C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>

    <div class="ms-wrapper">
        <div class="container">

            <h1 class="myFormTitle">Create a new project</h1>
    
            {{-- errore --}}
            @if ($errors ->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
            @endif
    
            {{-- form --}}
            <form method="POST" action="{{ route('projectStore')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Enter your project name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Enter a description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                
                <div class="form-group">
                    <label for="main_image">Upload the image of your repo</label>
                    <input type="file" class="form-control" name="main_image">
                </div>
               
                <div class="form-group">
                    <label for="release_date">Enter the release date</label>
                    <input type="date" class="form-control" name="release_date">
                </div>
                
                <div class="form-group">
                    <label for="repo_link">Enter the link of your repo</label>
                    <input type="text" class="form-control" name="repo_link">
                </div>
                
                <input class="mySubBtn" type="submit" value="Create new project">
            </form>
        </div>
    </div>

    {{-- wave --}}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#efd6b0" fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,240C1120,267,1280,245,1360,234.7L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
        </path>
    </svg>
@endsection
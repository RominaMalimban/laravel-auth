@extends('layouts.main-layout')

@section('content')
    
    <div class="container">

        <h1>Update your project</h1>
        
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
        <form method="POST" action="{{ route('projectUpdate', $project)}}" enctype="multipart/form-data">
            @csrf
            <label for="name">Enter your project name</label>
            <input type="text" name="name" value="{{$project -> name}}">
            <br>
            <label for="description">Enter a description</label>
            <input type="text" name="description" value="{{$project -> description}}">
            <br>
            <label for="main_image">Enter the link of the main image</label>
            <input type="file" name="main_image" value="{{$project -> main_image}}">
            <br>
            <label for="release_date">Enter the release date</label>
            <input type="date" name="release_date" value="{{$project -> release_date }}">
            <br>
            <label for="repo_link">Enter the link of your repo</label>
            <input type="text" name="repo_link" value="{{$project-> repo_link}}">
            <br>
            <input type="submit" value="UPDATE PROJECT">
        </form>
    </div>
    
@endsection
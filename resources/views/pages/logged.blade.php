@extends('layouts.main-layout')

@section('content')
    <div class="container ms-home">
        <h1>Repositories</h1>

        <h3>
            <a class="text-light" href="{{ route('projectCreate') }}">Create a new repository</a>
        </h3>
        
        <div class="my-cards">
            @foreach ($projects as $project)
            <div class="card mb-4 p-3">
                <a href="{{route('projectShow', $project)}}">
                    <h2>Repository: {{$project -> name}}</h2>
                </a>
                <p class="my-description"> {{$project -> description 
                                ? $project -> description 
                                : ""}}
                </p>
                
                <img src="{{ asset('storage/' . $project -> main_image) }}" alt="">
               
                <span>Release date: {{ $project -> release_date}}</span>
                <span>Repo link: {{ $project -> repo_link}}</span>

                <a href="{{route('projectDelete', $project)}}">ELIMINA</a>
                <a href="{{ route('projectEdit', $project) }}">EDIT</a>
            </div> 
        @endforeach
        </div>
        
        
    </div>
@endsection
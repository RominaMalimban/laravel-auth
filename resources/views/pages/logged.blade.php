@extends('layouts.main-layout')

@section('content')
    
    {{-- titolo --}}
    <h1 class="container myMainTitle">REPOSITORIES</h1>
    
    {{-- svg onda --}}
    <svg class="myWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path  fill="#efd6b0" fill-opacity="1" 
            d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,240C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>

    <div class="ms-wrapper">

        <div class="container logged">

            <h3 class="createForm">
                <i class="fa-solid fa-plus"></i>
                <a href="{{route('projectCreate')}}">Create a new repository</a>
            </h3>  

            <div class="myCards">
                
                @foreach ($projects as $project)
                    <div class="card">

                        <img src="{{ $project -> main_image}}" alt="">
                        <img src="{{ asset('storage/' . $project -> main_image) }}" alt="">

                        <div class="mytext">
                            <a href="{{route('projectShow', $project)}}">
                                <h3>{{$project -> name}}</h3>
                            </a>
                        </div>
                        
                        <p class="my-description"> 
                            {{$project -> description 
                              ? $project -> description 
                              : ""}}
                        </p>
                        
                        <span>Release date: {{ $project -> release_date}}</span>
                        <div class="repoLink">
                            <i class="fa-brands fa-github"></i>
                            <a href="{{ $project -> repo_link}}">Link GitHub</a>
                        </div>
                        
                        <div class="myButtons">
                            <a href="{{route('projectDelete', $project)}}">Delete</a>
                            <a class="myEdit" href="{{ route('projectEdit', $project) }}">Edit</a>
                        </div>
                        
                    </div> 
                @endforeach
            </div>
        </div>
        
    </div>
 
@endsection
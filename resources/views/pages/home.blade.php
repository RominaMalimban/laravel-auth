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
    {{-- <svg class="myWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill=" #272b33 " fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,240C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>--}}
    <div class="ms-home"> 

        <div class="container">

            <div class="myCards">
                @foreach ($projects as $project)

                {{-- card --}}
                <div class="card">
                    <img src="{{ $project -> main_image}}" alt="">

                    <div class="mytext">
                        <a href="{{route('projectShow', $project)}}">
                            <h3>{{$project -> name}}</h3>
                        </a>
                        <p class="my-description">{{$project -> description 
                                        ? $project -> description 
                                        : " "}}
                        </p>
                        <span>Release date: {{ $project -> release_date}}</span>
                        <div class="repoLink">
                            <i class="fa-brands fa-github"></i>
                            <a href="{{ $project -> repo_link}}">Link GitHub</a>
                        </div>
                    </div>
                    
                </div> 
            @endforeach
            </div>
            
        </div>
            
        
        
        
    </div>
@endsection
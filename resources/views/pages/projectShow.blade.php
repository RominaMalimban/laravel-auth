@extends('layouts.main-layout')

@section('content')
 
    <h2 class="container myMainTitle">{{$project -> name}}</h2>

    {{-- wave --}}
    <svg class="myWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#efd6b0" fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,240C1120,267,1280,245,1360,234.7L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>

    <div class="show">
        <div class="container">
            <div class="myCard">
                
                <img src="{{ $project -> main_image}}" alt="">
                <img src="{{ asset('storage/' . $project -> main_image) }}" alt="">
              
                <div class="myText">
                    <p>{{$project -> description 
                        ? $project -> description 
                        : ""}}
                    </p>
                    <span>Release date: {{ $project -> release_date}}</span>
                    <div class="repoLink">
                        <i class="fa-brands fa-github"></i>
                        <a href="{{ $project -> repo_link}}">Link GitHub</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
   
    {{-- wave --}}
    <svg class="btmWave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#efd6b0" fill-opacity="1" d="M0,224L80,197.3C160,171,320,117,480,128C640,139,800,213,960,240C1120,267,1280,245,1360,234.7L1440,224L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
        </path>
    </svg>

@endsection
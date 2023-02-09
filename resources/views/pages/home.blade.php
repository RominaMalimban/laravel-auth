@extends('layouts.main-layout')

@section('content')
    <div class="container ms-home">

        <h1 class="text-light my-4">Repositories</h1>

        <div class="my-cards">
            @foreach ($projects as $project)
            <div class="card mb-5 p-3">
                <a href="{{route('projectShow', $project)}}">
                    <h2>Repository: {{$project -> name}}</h2>
                </a>
                <p class="my-description">{{$project -> description 
                                ? $project -> description 
                                : " "}}
                </p>
                <span>Link immagine: {{ $project -> main_image}}</span>
                <span>Release date: {{ $project -> release_date}}</span>
                <span>Repo link: {{ $project -> repo_link}}</span>
            </div> 
        @endforeach
        </div>
        
        
    </div>
@endsection
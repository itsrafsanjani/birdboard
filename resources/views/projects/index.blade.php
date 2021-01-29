@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-center w-full">
            <h3 class="text-gray-400">My Projects</h3>
            <a href="/projects/create" class="btn-blue">New Project</a>
        </div>
        
    </header>
    
    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
        <div class="lg:w-1/3 p-3 pb-6">
            <div class="bg-white p-5 rounded-lg shadow-md" style="height: 200px;">
                <h3 class="text-xl font-normal py-4 -ml-5 border-l-4 border-blue-400  pl-4">
                    <a href="{{ $project->path() }}">{{ $project->title }}</a>
                </h3>
                <div class="text-gray-400">{{ Str::limit($project->description, 100) }}</div>
            </div>
        </div>
        @empty
            <div>No projects yet!</div>
        @endforelse
    </main>
@endsection
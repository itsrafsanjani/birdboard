@extends('layouts.app')

@section('content')
    <div class="flex items-center mb-3">
        <a href="/projects/create">New Project</a>
    </div>
    
    <div class="flex">
        @forelse($projects as $project)
            <div class="bg-white mr-4 p-5 rounded shadow w-1/3" style="height: 200px;">
                <h3 class="text-xl font-normal py-4">{{ $project->title }}</h3>
                <div class="text-gray-400">{{ Str::limit($project->description, 100) }}</div>
            </div>
        @empty
            <div>No projects yet!</div>
        @endforelse
    </div>
@endsection
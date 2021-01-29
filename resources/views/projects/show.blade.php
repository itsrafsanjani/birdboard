@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <h3 class="text-gray-400">
                <a href="/projects">My Projects</a> / {{ $project->title }}
            </h3>
            <a href="/projects/create" class="btn-blue">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-400 mb-3">Tasks</h2>
                    {{-- tasks --}}
                    <div class="card mb-3">Lorem ipsum</div>
                    <div class="card mb-3">Lorem ipsum</div>
                    <div class="card mb-3">Lorem ipsum</div>
                    <div class="card">Lorem ipsum</div>
                </div>

                <div>
                    <h2 class="text-lg text-gray-400 mb-3">General Notes</h2>
    
                    {{-- general notes --}}
                    <textarea class="card w-full focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75" style="min-height: 200px;" placeholder="Add general note here.."></textarea>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>
@endsection


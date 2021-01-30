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
                    @forelse ($project->tasks as $task)
                        <div>
                            <form action="{{ $task->path() }}" method="POST" class="card flex mb-3 items-center">
                                @method('PATCH')
                                @csrf
                                <input class="focus:outline-none w-full {{ $task->completed ? 'text-gray-300' : ''}}" type="text" name="body" value="{{ $task->body }}">
                                <input type="checkbox" name="completed" id="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                            </form>
                        </div>
                    @empty
                        <div class="text-center text-gray-400 mb-3">No tasks yet!</div>
                    @endforelse
                        <form action="{{ $project->path() . '/tasks'}}" method="post">
                            @csrf
                            <div class="flex justify-between">
                                <input class="card focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 w-5/6 mr-2" placeholder="Add a new task..." type="text" name="body">
                                <button type="submit" class="btn-blue w-1/6">Add task</button>
                            </div>
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <span class="block sm:inline">{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </form>
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


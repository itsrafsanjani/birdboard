@extends('layouts.app')

@section('content')
    <h1>Create a Project</h1>

    <form action="/projects" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <button type="submit">Create Project</button>
        <a href="/projects">Cancel</a>
    </form>
@endsection

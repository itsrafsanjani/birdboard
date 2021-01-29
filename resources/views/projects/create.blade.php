@extends('layouts.app')

@section('content')
    <h1>Create a Project</h1>

    <form action="/projects" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="email" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="password" class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Project</button>
        <a href="/projects" class="btn btn-danger">Cancel</a>
    </form>
@endsection
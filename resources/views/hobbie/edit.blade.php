@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Edit Hobbie {{  $hobbie->id }}</h1>
        </div>    
    </div>
    <div class="row">
        <div class="col">
            <a href="/hobbies" class="btn btn-secondary">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/hobbies/{{ $hobbie->id }}" method="POST">
            @csrf
            @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Write Title..." value="{{ $hobbie->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Write Description..." value="{{ $hobbie->description }}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
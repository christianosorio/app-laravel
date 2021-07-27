@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Delete Hobbie {{  $hobbie->id }}</h1>
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
            @method('delete')
            <br>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
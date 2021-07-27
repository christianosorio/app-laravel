@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col">
            <h1>Hobbies</h1>
        </div>    
    </div>
    <div class="row">
        <div class="col">
            <a href="/" class="btn btn-secondary">Home</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a href="/hobbies/create" class="btn btn-primary">Create Hobbie</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                     <th className="px-0">Actions</th>
                    </tr>
                </thead>
                @foreach($hobbies as $hobbie)
                    <tr>
                        <td class="pl-sm-24 capitalize" align="left">
                            {{ $hobbie->id }}
                        </td>
                        <td class="pl-sm-24 capitalize" align="left">
                            {{ $hobbie->title }}
                        </td>
                        <td class="pl-sm-24 capitalize" align="left">
                            {{ $hobbie->description }}
                        </td>
                        <td>
                             <div class="d-flex">
                                <div class="cursor-pointer mr-3">
                                    <a href="/hobbies/{{ $hobbie->id }}/edit">
                                        <svg class="i-edit" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="cursor-pointer mr-3">
                                    <a href="/hobbies/{{ $hobbie->id }}/confirmDelete">
                                        <svg class="i-trash" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" style="color: red;">
                                            <path d="M28 6 L6 6 8 30 24 30 26 6 4 6 M16 12 L16 24 M21 12 L20 24 M11 12 L12 24 M12 6 L13 2 19 2 20 6" />
                                        </svg>
                                    </a>
                                </div>
                             </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {!! $hobbies->links() !!}
            </div>
        </div>
    </div>
@endsection
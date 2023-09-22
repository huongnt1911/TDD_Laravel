@extends('layouts.app')

@section('content')
<div class="dropdown">
    
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name ?? ""}}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
        <li><a class="dropdown-item" href="{{ route('tasks.index') }}">Task</a></li>
        <li><a class="dropdown-item" href="{{ route('tasks.create') }}">Create Task</a></li>
        @if (Auth::check()) 
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        @else 
        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
        @endif
    </ul>
</div>

    <div style="padding-left: 80px">
        <a href="{{ route('home') }}" class="btn btn-success">Home</a>
        <a class="btn btn-success" style="margin-left: 20px" href="{{ route('tasks.create') }}">Create Task</a>
    </div>

    <div class="form-inline" style="text-align: center; margin-top:20px; margin-bottom:20px">
        <form style="display: flex; padding-left: 80px; padding-right: 80px;" action="{{ route('tasks.index') }}"
            method="GET">
            <input class="form-control" style="width: 100%" type="search" name="content" value="{{ request('content') }}"
                placeholder="➜  Search...">
            <button class="btn btn-success" type="submit" name="btn">Search</button>
        </form>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
                @if ($tasks->total() > 0)
                    @foreach ($tasks as $task)
                        <tr>
                            <th>{{ $task->id }}</th>
                            <th>{{ $task->name }}</th>
                            <th>{{ $task->content }}</th>
                            <th>
                                <form method="POST" action="{{ route('tasks.delete', $task->id) }}" id="formSubmitDelete{{$task->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" style="width:100px" onclick="myFunction(event)">Delete</button>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning" style="width:100px">Edit</a>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <th>Nope</th>
                @endif
            </table>
            {{ $tasks->links() }}
        </div>
    </div>
@endsection

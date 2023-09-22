@extends('layouts.app')

@section('content')
    <div class="dropdown" style="text-align: right">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <div style="padding-left: 80px">
        <a href="{{ route('home') }}" class="btn btn-success">Home</a>
        <a class="btn btn-success" style="margin-left: 20px" href="{{ route('tasks.index') }}">Task</a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Create Task</h2>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <input type="text" name="name" id="" class="form-group" placeholder="Name..." value="{{ old('name') ?? ""}}">
                            @error('name')
                                <span id="name-error" class="error text-danger"
                                    style="display:block;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-body">
                            <input type="text" name="content" id="" class="form-group" placeholder="Content..." value="{{ old('content') ?? ""}}">
                            @error('content')
                                <span id="content-error" class="error text-danger"
                                    style="display:block;">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

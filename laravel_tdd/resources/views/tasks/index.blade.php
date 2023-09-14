@extends('layouts.app')

@section('content')
    <div class="form-inline" style="text-align: center; margin-top:20px; margin-bottom:20px">
        <form action="{{route('tasks.index')}}" method="GET">
            <input type="search" name="content" value="{{request(('key'))}}" placeholder="➜  ~ Thích j tìm đi nhé, iu iu!">
            <button type="submit" name="btn">Search</button>
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
                @foreach($tasks as $task)
                    <tr>
                        <th>{{ $task->id }}</th>
                        <th>{{ $task->name }}</th>
                        <th>{{ $task->content }}</th>
                        <th>
                            <form method="POST" action="{{route('tasks.delete',$task->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                                <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-warning">Edit</a>
                            </form>
                        </th>                        
                    </tr>
                @endforeach
            </table>
            
        </div>

    </div>
@endsection

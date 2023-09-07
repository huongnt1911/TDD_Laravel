@extends('layouts.task')

@section('index')

    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Content</th>
                </tr>
                @foreach($tasks as $task)
                    <tr>
                        <th>{{ $task->id }}</th>
                        <th>{{ $task->name }}</th>
                        <th>{{ $task->content }}</th>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection

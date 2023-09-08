@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Create Task</h2>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <input type="text" name="name" id="" class="form-group" placeholder="Name...">
                            @error('name')
                                <span id="name-error" class="error text-danger"
                                style="display:block;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-body">
                            <input type="text" name="content" id="" class="form-group" placeholder="Content...">
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
 
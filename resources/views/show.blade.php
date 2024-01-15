@extends('layouts.app')
@section('title','Description')

@section('content')
    <div>
        {{ $task->title }}
    </div>
    <div>
        <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection

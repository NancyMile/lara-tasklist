@extends('layouts.app')
@section('title','Description')

@section('content')
    <div>
        {{ $task->title }}
    </div>
    <p>
        @if ($task->completed)
            Completed
        @else
            No completed
        @endif
    </p>
    <div>
        <form method="POST" action="{{ route('tasks.toggle-completed',['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>
    <div>
        <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection

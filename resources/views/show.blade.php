@extends('layouts.app')
@section('title','Description')

@section('content')
    <div class="mb-4">
        {{ $task->title }}
    </div>

    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link"> ⬅️ Go back to the task list</a>
    </nav>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">{{ $task->created_at->diffForHumans() }} created 💠 {{ $task->updated_at->diffForHumans() }} updated</p>

    <p class="mb-4">
        @if ($task->completed)
            <spam class="font-medium text-green-500">Completed</spam>
        @else
            <spam class="font-medium text-red-500">No completed</spam>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit',['task' => $task]) }}" class="btn">Edit</a>
        <div>
            <form method="POST" action="{{ route('tasks.toggle-completed',['task' => $task]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
            </form>
        </div>
        <div>
            <form action="{{ route('tasks.destroy',['task' => $task->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn">Delete</button>
            </form>
        </div>
    </div>
@endsection

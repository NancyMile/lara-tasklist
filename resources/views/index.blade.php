@extends('layouts.app');

@section('title','Index')

@section('content')
    @forelse ($tasks as $task )
    <div>
        <a href="{{ route('tasks.show',['id' => $task->id]) }}">{{ $task->title }}</a>
    </div>
    @empty
    <div>No tasks</div>
    @endforelse ( $tasks as $task )
@endsection

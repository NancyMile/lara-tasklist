@extends('layouts.app');
@section('title','Description')

@section('content')
    <div>
        {{ $task->title }}
    </div>
@endsection

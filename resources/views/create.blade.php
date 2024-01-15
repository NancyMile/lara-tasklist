@extends('layouts.app')
@section('title','create')

@section('styles')
<style>
    .error-message {
        color:red;
        font-size: 0,8rem;

    }
</style>
@endsection

@section('content')
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" name="title" id="title"/>
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">
            Description
        </label>
        <textarea rows="5" name="description" id="description"></textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea rows="10" name="long_description" id="long_description"></textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Add Task</button>
    </div>
</form>
@endsection
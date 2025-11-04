@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{$task->description}}</p>
    <p>{{$task->long_description}}</p>
    @if($task->completed)
        <p>Completed</p>
    @else
        <p>Not Completed</p>
    @endif
    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <div>
        <form method="POST" action="{{route('tasks.toggle-complete', ['task' => $task->id])}}">
            @csrf
            @method('PUT')
            <button type="submit">Mark as {{$task->completed ? 'not completed' : 'completed'}}</button>
        </form>
    </div>

    <div>
        <a href="{{route('tasks.update' , ['task' => $task->id])}}">Edit</a>
    </div>

    <div>
        <form method="POST" action="{{route('tasks.destroy', ['task' => $task->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>

    <div>
        <a href="{{route('tasks.index')}}">Return</a>
    </div>

@endsection


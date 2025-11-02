@extends('layouts.app')


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
@endsection


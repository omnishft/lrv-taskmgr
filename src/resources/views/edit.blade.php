@extends('layouts.app')


@section('content')
    @include('form', ['task' => $task])
    <div>
        <a href="{{route('tasks.index')}}">Cancel</a>
    </div>
@endsection

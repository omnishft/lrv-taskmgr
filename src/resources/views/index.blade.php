@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
   @if($tasks)
        @foreach($tasks as $task)
            <!-- <li class="text-red-800"> -->
            <!--     {{$task->title}} -->
            <!-- </li> -->
            <li>
                <a href="{{route('tasks.show',['id' => $task->id])}}">{{$task->title}}</a>
            </li>
        @endforeach
   @else
       <p>No Tasks</p>
   @endif

@endsection

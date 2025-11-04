@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
   <div>
        <a href="{{route('tasks.create')}}">Add Task</a>
   </div>
   @if($tasks)
        @foreach($tasks as $task)
            <!-- <li class="text-red-800"> -->
            <!--     {{$task->title}} -->
            <!-- </li> -->
            <li>
                <a href="{{route('tasks.show',['task' => $task->id])}}">{{$task->title}}</a>
            </li>
        @endforeach
   @else
       <p>No Tasks</p>
   @endif

    @if($tasks->count())
        <nav>
            {{$tasks->links()}}
        </nav>
    @endif
@endsection

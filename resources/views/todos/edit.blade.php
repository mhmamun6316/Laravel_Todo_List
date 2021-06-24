@extends('todos.layout')

@section('title')
ALL todos
@endsection

@section('content')
            <form  method="post" action="{{route('todo.update',$todo->id)}}">
            @csrf
               <div class="addTask">
                    <input type="text" name="title" value="{{$todo->title}}">
                    <button type="submit">Update</button>
               </div>    
           </form>
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <ul class="list-unstyled pt-2">
        <h2>Not completed</h2>
            @forelse($todos as $todo)
                <li>
                  <div class="d-flex justify-content-between notCompleted">
                       <div class="d-flex flex-row mx-2">
                            <p>{{$todo->title}}</p>
                       </div>
                        <div>
                            <button type="button" class="btn mx-2"><a class=" text-decoration-none" href="/todos/edit/{{$todo->id}}"><i class="text-dark fas fa-edit"></i></a> </button> 
                            <button type="button" class="btn mx-2"><a class="text-decoration-none" href="/todos/delete/{{$todo->id}}"><i class="text-dark fas fa-trash"></i></a> </button> 
                            @include('todos.checkButton')
                        </div>
                  </div>
                </li> 
            @empty
                <p>No Task available,please create one</p> 
            @endforelse 
        </ul>
        <ul class="list-unstyled pt-2">
        <h2>Completed</h2>
            @forelse($todocom as $todoco)
                <li>
                  <div class="d-flex justify-content-between completed">
                       <div class="d-flex flex-row mx-2">
                            <p>{{$todoco->title}}</p>
                       </div>
                        <div>
                            <button type="button" class="btn mx-2"><a class="text-white text-decoration-none" href="/todos/edit/{{$todoco->id}}"><i class="fas fa-edit text-dark"></i></a> </button> 
                            <button type="button" class="btn mx-2"><a class="text-white text-decoration-none" href="/todos/delete/{{$todoco->id}}"><i class="fas fa-trash text-dark"></i></a> </button> 
                        </div>
                  </div>
                </li> 
            @empty
                <p>No Task completed,please complete one</p> 
            @endforelse 
        </ul>
@endsection

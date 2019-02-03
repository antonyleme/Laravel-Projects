@extends('layout')

@section ('content')
    <div class="row">
        <div class="mr-auto ml-auto">
            <form action="/create/todo" method="post" class="form-inline">
                {{ csrf_field() }}
                <input type="text" class="form-control" name="todo" placeholder="Create a new todo" style="min-width: 500px">
                <input type="submit" class="btn btn-primary ml-2" value="add">
            </form>
        </div>
    </div>

    <hr>

    @foreach($todos as $todo)
        <form action="{{ route('todos.save', ['id' => $todo->id]) }}" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input type="text" class="todo-form" name="todo" value="{{ $todo->todo }}">
            <a href=" {{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"> x </a>
            <input type="submit" class="btn btn-info" value="update">
            @if(!$todo->completed)
                <a href="{{ route('todos.completed', ['id' => $todo->id])}}" class="btn btn-success"> mark as completed </a>
            @else
                <span>Completed!</span>
            @endif
        </form>
        <hr>
    @endforeach
@stop

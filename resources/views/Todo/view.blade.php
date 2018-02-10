@extends('layouts.app')

@section('content')

<table id="views" >
    <thead>
    <tr>
        <td>
            Task Name        </td>

        <td>
            Task Description        </td>

        <td>
            Deadline
        </td>
        <td>
            Edit
        </td>
        <td>
            Delete
        </td>
    </tr>
    </thead>

   <?php $user = Auth::User();?>
    <tbody>
    @foreach ($user->todos as $todo)

     <tr>
            <td>
    {{$todo['Task Name']}}
         </td>
        <td>
            {{$todo['Task Description']}}
        </td>
        <td>
            {{$todo['Deadline']}}

        </td>
        <td>
            <a href="/edit/{{$todo->id}}" >Edit</a>
        </td>
        <td>
         <a href="/delete/{{$todo->id}}" >Delete</a>
        </td>

    </tr>

    @endforeach
    </tbody>

</table>
@endsection

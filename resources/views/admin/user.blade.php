@extends('layouts.layout')

@section('content')
    <table style="width:100%" border:1>
        <tr> 
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
         <tr>
            <td><a href="{{route('viewUser',$user->id)}}">{{ $user->name }}</a></td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{url('edit-user/'.$user->id)}}">Edit</a>
                <a style="color:red;" href="{{url('delete-user/'.$user->id)}}">Delete</a>
            </td>
         </tr>
        @endforeach
    </table>
@endsection

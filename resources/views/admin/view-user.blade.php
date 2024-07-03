@extends('layouts.layout')
@section('title','View User ')

@section('content')
<div>
<p>Name: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>
</div>
    
@endsection
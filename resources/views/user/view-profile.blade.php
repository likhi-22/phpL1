@extends('layouts.layout')
@section('title','View-Profile')

@section('content')
<div>
<p>Name: {{Auth::user()->name}}</p>
<p>Email: {{Auth::user()->email}}</p>
</div>
<a href="{{url('edit-profile')}}">Edit</a>
@endsection
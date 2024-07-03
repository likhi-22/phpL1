@extends('layouts.layout')

@section('content')
  <p>Hello{{Auth::user()->name}}</p>
@endsection
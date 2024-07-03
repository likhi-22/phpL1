@extends('layouts.layout')
@section('title','Login')

@section('content')
  <div class="login-form">
    <form action="{{route('login')}}" method="POST" autocomplete="off">
      @csrf
      <h2 class="text-center">Login</h2>
      <div class="form-group">Email
        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
        @if($errors->any())
          @if($errors->has('email'))
          <div class="error text-left">{{$errors->first('email')}}</div>
          @endif
        @endif
      </div>
      <div class="form-group">Password
        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        @if($errors->any())
          @if($errors->has('password'))
          <div class="error text-left">{{$errors->first('password')}}</div>
          @endif
        @endif
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" style="border-radius:0%;">Login</button>
      </div>
    </form>
    <p class="text-center">Don't have an account?<a href="{{url('register')}}" class="text-danger"> Register Here</a></p>
  </div>
@endsection
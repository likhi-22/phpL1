@extends('layouts.layout')
@section('title','Registration')

@section('content')
  <div class="signup-form" >
    <form id="registrationForm" action="{{route('register')}}" method="POST" autocomplete="off" align-text="center">
      @csrf
      <h2>Register</h2>
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required="required">
          @if($errors->any())
            @if($errors->has('name'))
            <div class="error text left">{{$errors->first('name')}}</div>
            @endif
           @endif
        </div>
        
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" required="required">
          @if($errors->any())
            @if($errors->has('email'))
            <div class="error text left">{{$errors->first('email')}}</div>
            @endif
           @endif
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="required">
          @if($errors->any())
            @if($errors->has('password'))
            <div class="error text left">{{$errors->first('password')}}</div>
            @endif
           @endif
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required="required">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-lg btn-block" style="border-radius:0%;">Register</button>
        </div>
    </form>
    <p class="text-center">Already have an account?<a href="{{url('login')}}" class="text-success">Login Here</a></p>
  </div>
  
@endsection
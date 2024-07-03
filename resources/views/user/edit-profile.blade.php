@extends('layouts.layout')
@section('title','edit-profile')

@section('content')
<h1>UPDATE</h1>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <form id="updateForm" action="{{route('uProfile')}}"method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">
                            name
                        </label>
                        <input type="text" class="form-control" id="name" placeholder="Name" required name="name" value="{{Auth::user()->name}}"/>
                        @if($errors->any())
                        @if($errors->has('name'))
                        <div class="error text left">{{$errors->first('name')}}</div>
                        @endif
                       @endif
                    </div>
                    <div class="form-group">
                        <label for="email">
                            email
                        </label>
                        <input type="email" class="form-control" id="email" placeholder="Email" required name="email" value="{{Auth::user()->email}}" readonly/>
                        @if($errors->any())
                        @if($errors->has('email'))
                        <div class="error text left">{{$errors->first('email')}}</div>
                        @endif
                       @endif
                    </div>
                    <button class="btn btn-danger" type="submit">
                        update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection



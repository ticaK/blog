@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    <h2 class="blog-post-title">login</h2>

    <form method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}

       

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email"/>
            @include('partials.invalid-feedback', ['field' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"/>
            @include('partials.invalid-feedback', ['field' => 'password'])
        </div>
        <div class="form-group">
                @include('partials.invalid-feedback', ['field' => 'message'])

        </div>
        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>
@endsection
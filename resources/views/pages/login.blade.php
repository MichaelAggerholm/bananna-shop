@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="login-page">
        <div class="login-box">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group m-2">
                    <input type="email" name="email" id="email" class="form-control @error('email') has-error @enderror" placeholder="John@gmail.com" value="{{old('email')}}">
                    @error('email')
                    <span class="field-error">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group m-2">
                    <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror" placeholder="********">
                    @error('password')
                    <span class="field-error">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary m-2">Log ind</button>
                <br />
                <a href="{{route('register')}}" class="nav-link m-2">Ny bruger? Registrer nu..</a>
            </form>
        </div>
    </div>

@endsection

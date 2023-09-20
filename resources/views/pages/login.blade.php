@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="login-page">
        <div class="login-box">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group m-2">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
                <div class="form-group m-2">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary m-2">Log ind</button>
                <br />
                <a href="{{route('register')}}" class="nav-link m-2">Ny bruger? Registrer nu..</a>
            </form>
        </div>
    </div>

@endsection

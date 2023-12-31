@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <section class="login-page">
        <div class="login-form-box" style="margin-top: 150px">
            <div class="login-title" style="margin-bottom: 50px">Registrer</div>
            <div class="login-form">
                <form action="{{route('register')}}" method="post" id="userRegistrationForm">
                    @csrf

                    <div class="field form-group m-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') has-error @enderror" placeholder="John Doe">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="password">Adgangskode</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') has-error @enderror" placeholder="********">
                        @error('password')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="password_confirmation">Bekræft adgangskode</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="********">
                    </div>

                    <div class="field form-group m-2">
                        <label for="cvr">CVR</label>
                        <div class="cvrContainer">
                            <input type="text" name="cvr" id="cvr" class="form-control @error('cvr') has-error @enderror" placeholder="12345678">
                        </div>
                        @error('cvr')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="company">Firma</label>
                        <input type="text" name="company" id="company" class="form-control @error('company') has-error @enderror" placeholder="Banana shop">
                        @error('company')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') has-error @enderror" placeholder="John@gmail.com">
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="address">Adresse</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') has-error @enderror" placeholder="Ørnevej 56">
                        @error('address')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="city">By</label>
                        <input type="text" name="city" id="city" class="form-control @error('city') has-error @enderror" placeholder="Svenstrup">
                        @error('city')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="zip">Postnr</label>
                        <input type="number" name="zip" id="zip" class="form-control @error('zip') has-error @enderror" placeholder="9230">
                        @error('zip')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2">
                        <label for="phone">Telefon</label>
                        <input type="number" name="phone" id="phone" class="form-control @error('phone') has-error @enderror" placeholder="12345678">
                        @error('phone')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field form-group m-2" style="margin-top: 30px">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                    <a href="{{route('login')}}">Allerde bruger? Login nu..</a>

                </form>
            </div>
        </div>
    </section>
@endsection

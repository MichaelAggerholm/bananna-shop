@extends('layouts.admin')
@section('title', 'Opret bruger')
@section('content')
    <h1 class="page-title">Opret bruger</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Opret bruger</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.users.store')}}" method="post">
                            @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Navn</label>
                                            <input type="text" name="name" id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{old('name')}}"/>
                                            @error('name')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{old('email')}}"/>
                                        @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="password">Adgangskode</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}"/>
                                        @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation">Bekræft Adgangskode</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="company">Firma</label>
                                        <input type="text" name="company" id="company"
                                               class="form-control @error('company') is-invalid @enderror"
                                               value="{{old('company')}}"/>
                                        @error('company')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="address">Adresse</label>
                                        <input type="text" name="address" id="address"
                                               class="form-control @error('address') is-invalid @enderror"
                                               value="{{old('address')}}"/>
                                        @error('address')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city">By</label>
                                        <input type="text" name="city" id="city"
                                               class="form-control @error('city') is-invalid @enderror"
                                               value="{{old('city')}}"/>
                                        @error('city')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="zip">Postnr</label>
                                        <input type="number" name="zip" id="zip"
                                               class="form-control @error('zip') is-invalid @enderror"
                                               value="{{old('zip')}}"/>
                                        @error('zip')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="phone">Telefon</label>
                                        <input type="number" name="phone" id="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               value="{{old('phone')}}"/>
                                        @error('phone')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="cvr">CVR</label>
                                        <input type="text" name="cvr" id="cvr"
                                               class="form-control @error('cvr') is-invalid @enderror"
                                               value="{{old('cvr')}}"/>
                                        @error('cvr')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--TODO: Add role select--}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="role_id">Rolle ID</label>
                                        <input type="number" name="role_id" id="role_id"
                                               class="form-control @error('role_id') is-invalid @enderror"
                                               value="{{old('role_id')}}"/>
                                        @error('role_id')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                        <label for="is_verified">Verificeret</label>
                                        <select name="is_verified" id="is_verified" class="form-control @error('is_verified') is-invalid @enderror">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_verified')
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
                                        <label for="is_admin">Admin</label>
                                        <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_admin')
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

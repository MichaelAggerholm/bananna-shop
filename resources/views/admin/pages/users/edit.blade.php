@extends('layouts.admin')
@section('title', 'Rediger ' . $user->name)
@section('content')
    <h1 class="page-title">Rediger bruger</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Rediger bruger</div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.users.edit', $user->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Navn</label>
                                        <input type="text" name="name" id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{$user->name}}"/>
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
                                               value="{{$user->email}}"/>
                                        @error('email')
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
                                        <label for="is_verified">Verificeret</label>
                                        <select name="is_verified" id="is_verified" class="form-control @error('is_verified') is-invalid @enderror">
                                            <option value="0" {{ $user->is_verified == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $user->is_verified == 1 ? 'selected' : '' }}>Yes</option>
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
                                            <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Yes</option>
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
                                <button type="submit" class="btn btn-primary">Rediger</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

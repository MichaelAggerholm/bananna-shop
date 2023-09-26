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
                                        <label for="company">Firma</label>
                                        <input type="text" name="company" id="company"
                                               class="form-control @error('company') is-invalid @enderror"
                                               value="{{$user->company}}"/>
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
                                               value="{{$user->address}}"/>
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
                                               value="{{$user->city}}"/>
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
                                               value="{{$user->zip}}"/>
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
                                               value="{{$user->phone}}"/>
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
                                               value="{{$user->cvr}}"/>
                                        @error('cvr')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Rolle</label>
                                        <select name="role_id" id="role_id"
                                                class="form-control @error('role_id') is_invalid @enderror">
                                            <option value="">-- Vælg rolle --</option>
                                            @foreach($roles as $role)
                                                <option
                                                    value="{{$role->id}}" {{$role->role_id == $role->id ? 'selected' : ''}}>
                                                    {{$role->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
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

@extends('layouts.admin')
@section('title', 'Users')
@section('content')
    <h1 class="page-title">Brugerer</h1>
    <div class="container">
        <div class="text-end mb-3">
            <a href="{{route('adminpanel.users.create')}}" class="btn btn-primary">+ &nbsp; Opret bruger</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Users</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Navn</th>
                                <th>Email</th>
                                <th>Oprettet</th>
                                <th>Opdateret</th>
                                <th>Verificeret</th>
                                <th>Admin</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y')}}</td>
                                    <td>
                                        <form action="{{route('adminpanel.user.is_verified.update', $user->id)}}" method="post" style="display:flex;gap:15px;max-width:300px;">
                                            @csrf
                                            <select name="is_verified" id="is_verified" class="form-control @error('is_verified') is-invalid @enderror">
                                                <option value="0" {{ $user->is_verified == 0 ? 'selected' : '' }}>No</option>
                                                <option value="1" {{ $user->is_verified == 1 ? 'selected' : '' }}>Yes</option>
                                            </select>
                                            <button type="submit" class="btn btn-success btn-sm">Opdater</button>
                                        </form>
                                    </td>
                                    <td>{{$user->is_admin}}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px;">
                                            <a href="{{route('adminpanel.users.edit', $user->id)}}" class="btn btn-secondary btn-sm">Rediger</a>

                                            <form action="{{route('adminpanel.users.destroy', $user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Slet</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

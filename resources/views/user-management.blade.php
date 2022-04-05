@extends('layout.master')
@section('title', 'User Management')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="heading">
            <h2>User Management System</h2><br>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">

                            <h2 class="card-subtitle mb-2 text-muted">Active Users</h2>
                            <h1 class="card-title">{{ count($no_users) }}</h1>

                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">

                            <h2 class="card-subtitle mb-2 text-muted">Super Admins</h2>
                            <h1 class="card-title">{{ count($no_super) }}</h1>

                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">

                            <h2 class="card-subtitle mb-2 text-muted">Admins</h2>
                            <h1 class="card-title">{{ count($no_admin) }}</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="heading">
            <div class="d-flex justify-content-end">
                <a href="{{ route('createUser') }}" class="btn btn-warning mb-2">Add</a>
            </div>
        </div>
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if ($user->name != 'Admin')
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->user_type }}</td>
                    <td>
                        @if ($user->is_active == 1)
                        <span class="label label-success">Approved</span>
                        @else
                        <span class="label label-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            @if ($user->is_active != 1)
                            <div class="mr-4">
                                <form method="POST" action="{{ route('verifyUser', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Verify User</button>
                                </form>
                            </div>
                            @endif
                            <div class="edit-button mr-4">
                                <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary">EDIT</a>
                            </div>
                            <div class="delete-button">
                                <!-- <a href="" class="btn btn-danger">DELETE</a> -->
                                <form method="POST" action="{{ route('deleteUser', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
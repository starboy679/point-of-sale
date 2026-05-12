@extends('layout')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Users</h2>
        <a href="/users/create" class="btn btn-primary">+ Add User</a>
    </div>

    <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th width="150">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

                <td>
                    @if($user->role == 'admin')
                        <span class="badge bg-success">Admin</span>
                    @elseif($user->role == 'cashier')
                        <span class="badge bg-primary">Cashier</span>
                    @elseif($user->role == 'inventory')
                        <span class="badge bg-warning text-dark">Inventory</span>
                    @endif
                </td>

                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-info">Edit</a>

                    <form action="/users/{{ $user->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this user?')">
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection
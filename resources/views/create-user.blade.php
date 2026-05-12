@extends('layout')

@section('content')

<div class="container mt-5" style="max-width:600px;">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Add User</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="/users">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="cashier">Cashier</option>
                        <option value="inventory">Inventory</option>
                    </select>
                </div>

                <button class="btn btn-success w-100">Create User</button>
                <a href="/users"class="btn btn-secondary w-100 mt-2">Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
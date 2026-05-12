@extends('layout')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-4">
                        Edit User
                    </h2>

                    <form method="POST" action="/users/{{ $user->id }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $user->name }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                New Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Leave blank to keep old password">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Role
                            </label>

                            <select
                                name="role"
                                class="form-select">

                                <option
                                    value="admin"
                                    {{ $user->role == 'admin' ? 'selected' : '' }}>

                                    Admin

                                </option>

                                <option
                                    value="cashier"
                                    {{ $user->role == 'cashier' ? 'selected' : '' }}>

                                    Cashier

                                </option>

                                <option
                                    value="inventory"
                                    {{ $user->role == 'inventory' ? 'selected' : '' }}>

                                    Inventory

                                </option>

                            </select>

                        </div>

                        <button class="btn btn-warning w-100">

                            Update User

                        </button>

                        <a
                            href="/users"
                            class="btn btn-secondary w-100 mt-2">

                            Back

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
@extends('layout')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary p-3">
                <h5>Total Sales</h5>
                <h2>{{ $total }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success p-3">
                <h5>Products</h5>
                <h2>{{ $products }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-white bg-dark p-3">
                <h5>Users</h5>
                <h2>{{ $users }}</h2>
            </div>
        </div>

    </div>
</div>

@endSection

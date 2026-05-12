@extends('layout')

@section('content')

<div class="container mt-5" style="max-width:600px;">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Add Product</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="/products">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>

                <button class="btn btn-success w-100">Save Product</button>
                <a href="/products" class="btn btn-secondary mb-3" style="margin-top:20px">← Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
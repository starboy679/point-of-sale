@extends('layout')

@section('content')

<div class="container mt-5" style="max-width:600px;">

    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Product</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="/products/{{ $product->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                </div>

                <button class="btn btn-warning w-100">Update Product</button>
                <a href="/products" class="btn btn-secondary mb-3" style="margin-top:20px">← Back</a>

            </form>

        </div>
    </div>

</div>

@endsection
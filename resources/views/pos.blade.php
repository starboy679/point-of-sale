@extends('layout')

@section('content')

@php
$products = \App\Models\Product::all();
@endphp

<link rel="stylesheet" href="/css/style.css">

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            POS System
        </h2>

        <input
            type="text"
            class="form-control w-25"
            placeholder="Search Product">

    </div>

    <div class="row">

        <!-- Products -->

        <div class="col-md-8">

            <div class="row">

                @foreach($products as $product)

                <div class="col-md-4 mb-4">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="card-body text-center">

                            <h5 class="fw-bold">
                                {{ $product->name }}
                            </h5>

                            <h4 class="text-primary mb-3">
                                ${{ $product->price }}
                            </h4>

                            <p class="text-muted">
                                Stock: {{ $product->quantity }}
                            </p>

                            <button
                                class="btn btn-primary w-100"

                                onclick="addToCart(
                                    '{{ $product->name }}',
                                    {{ $product->price }},
                                    {{ $product->id }}
                                )">

                                Add To Cart

                            </button>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        <!-- Cart -->

        <div class="col-md-4">

            <div class="card border-0 shadow">

                <div class="card-body">

                    <h3 class="fw-bold mb-4">
                        Cart
                    </h3>

                    <button
                        class="btn btn-danger w-100 mb-3"
                        onclick="clearCart()">

                        Clear Cart

                    </button>

                    <ul id="cart" class="list-group mb-3"></ul>

                    <h4 class="mb-4">

                        Total:
                        <span id="total">0</span> $

                    </h4>

                    <form method="POST" action="/checkout">

                        @csrf

                        <input
                            type="hidden"
                            id="totalInput"
                            name="total">

                        <input
                            type="hidden"
                            id="cartInput"
                            name="cart">

                        <button
                            class="btn btn-success w-100"
                            type="submit"
                            onclick="setTotal()">

                            Checkout

                        </button>

                    </form>

                    @if(session('error'))

                    <div class="alert alert-danger mt-3">

                        {{ session('error') }}

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    let total = 0;
    let cartData = [];

    function addToCart(name, price, id){

        price= Number(price);

        let existing = cartData.find(item => item.id ===id);

        if(existing){
            existing.quantity +=1;
        }else{
            cartData.push({
                id: id,
                name: name,
                price: price,
                quantity: 1
            });
        }
        renderCart();
    }

    function setTotal(){
        document.getElementById('totalInput').value = total;
        document.getElementById('cartInput').value = JSON.stringify(cartData);
    }
    function clearCart(){
        cartData = [];
        document.getElementById('cart').innerHTML = "";
        total = 0;
        document.getElementById('total').innerText = total;
    }
    
    function renderCart(){
        let cart = document.getElementById('cart');
        cart.innerHTML = "";

        total = 0;

        cartData.forEach(item => {
            let li = document.createElement('li');
            li.innerText = item.name + " x" + item.quantity + " = " + (item.price * item.quantity);

            cart.appendChild(li);

            total += item.price * item.quantity;
        });
        document.getElementById('total').innerText = total;
    }
    
    </script>
    

@endsection



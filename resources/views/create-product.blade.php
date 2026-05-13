@extends('layout')

@section('content')

<div class="container mt-5" style="max-width:600px;">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>اضافة منتج</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="/products">
                @csrf

                <div class="mb-3">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>السعر</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>الكمية</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>

                <button class="btn btn-success w-100">حفظ المنتج</button>
                <a href="/products" class="btn btn-secondary mb-3" style="margin-top:20px">رجوع←</a>

            </form>

        </div>
    </div>

</div>

@endsection
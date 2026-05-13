@extends('layout')

@section('content')

@php
$products = \App\Models\Product::all();
@endphp


<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>المنتجات</h2>
        <a href="/products/create" class="btn btn-primary">اضافة منتج +</a>
    </div>

    <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>الاسم</th>
                <th>السعر</th>
                <th>الكمية</th>
                <th>الحالة</th>
                <th width="150">التفاعلات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}ج.س </td>
                <td>{{ $product->quantity }}</td>

                <td>
                    @if($product->quantity == 0)
                        <span class="badge bg-danger">نفذت الكمية</span>
                    @elseif($product->quantity < 5)
                        <span class="badge bg-warning text-dark">منخفض</span>
                    @else
                        <span class="badge bg-success">متاح</span>
                    @endif
                </td>

                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-info">تعديل</a>

                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this product?')">
                            حذف
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

</div>

@endsection

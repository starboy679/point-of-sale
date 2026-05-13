@extends('layout')

@section('content')

<div class="container-fluid">
    <h2 class="mb-4">المخزون</h2>

    @if($lowStock > 0)
        <div class="alert alert-warning">
            ⚠️هنالك عدد ({{ $lowStock }}) منتجات منخفضة الكمية
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>الاسم</th>
                <th>الكمية</th>
                <th>الحالة</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>

                    <td>{{ $product->quantity }}</td>

                    <td>
                        @if($product->quantity == 0)
                            <span class="badge bg-danger">نفذ</span>

                        @elseif($product->quantity < 5)
                            <span class="badge bg-warning text-dark">منخفض</span>

                        @else
                            <span class="badge bg-success">جيد</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
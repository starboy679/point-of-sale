@extends('layout')

@section('content')

<div class="container">
    <h3>العملية #{{ $sale->id }}</h3>

    <p><strong>الاجمالي:</strong> ${{ $sale->total }}</p>
    <p><strong>التاريخ:</strong> {{ $sale->created_at }}</p>

    <hr>

    <h4>العناصر</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>المنتاجت</th>
                <th>الكمية</th>
                <th>السعر</th>
            </tr>
        </thead>

        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ \App\Models\Product::find($item->product_id)->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}ج.س </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<a href="/sales" class="btn btn-secondary mb-3" style="margin-top:20px">رجوع←</a>
</div>

@endsection
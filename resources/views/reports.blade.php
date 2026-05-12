
@extends('layout')

@section('content')
    <h1>Reports</h1>

    <hr>

    <h4>Total Sales: {{ $total }}</h4>
    <h4>Invoices Count: {{ $count }}</h4>

    <hr>
    <h4>Top Selling Products</h4>
    <table class="table table-border">
        <tr>
            <th>Products</th>
            <th>Quantity Sold</th>
        </tr>
        
        @foreach($topProducts as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->total_qty }}</td>

            </tr>
        @endforeach
</table>

@endsection
@extends('layout')

@section('content')

<div class="container-fluid">
    <h2 class="mb-4">Inventory</h2>

    @if($lowStock > 0)
        <div class="alert alert-warning">
            ⚠️ There are {{ $lowStock }} products low in stock
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>

                    <td>{{ $product->quantity }}</td>

                    <td>
                        @if($product->quantity == 0)
                            <span class="badge bg-danger">Out</span>

                        @elseif($product->quantity < 5)
                            <span class="badge bg-warning text-dark">Low</span>

                        @else
                            <span class="badge bg-success">OK</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
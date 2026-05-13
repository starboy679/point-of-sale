@extends('layout')

@section('content')

<div class="container-fluid">
    <h2 class="mb-4">المبيعات</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>الاجمالي</th>
                <th>التاريخ</th>
                <th>التفاصيل</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>

                    <td>{{ $sale->total }} ج.س </td>

                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>

                    <td>
                        <a href="/sales/{{ $sale->id }}" class="btn btn-sm btn-primary">
                            انظر
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
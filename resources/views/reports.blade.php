
@extends('layout')

@section('content')
    <h1>التقارير</h1>

    <hr>

    <h4>اجمالي المبيعات : {{ $total }}</h4>
    <h4>حاسبة الفواتير: {{ $count }}</h4>

    <hr>
    <h4>اكثر المنتجات مبيعا</h4>
    <table class="table table-border">
        <tr>
            <th>المنتجات</th>
            <th>كميات مبيعة</th>
        </tr>
        
        @foreach($topProducts as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->total_qty }}</td>

            </tr>
        @endforeach
</table>

@endsection
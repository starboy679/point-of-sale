@extends('layout')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">لوحة التحكم</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary p-3">
                <h5>اجمالي المبيعات</h5>
                <h2>{{ $total }} ج.س</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success p-3">
                <h5>المنتجات</h5>
                <h2>{{ $products }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-white bg-dark p-3">
                <h5>المستخدمين</h5>
                <h2>{{ $users }}</h2>
            </div>
        </div>

    </div>
</div>
@endSection

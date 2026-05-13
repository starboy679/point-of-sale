@extends('layout')

@section('content')

<div class="container mt-5" style="max-width:600px;">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>مستخدم جديد</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="/users">
                @csrf

                <div class="mb-3">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>الوظيفة</label>
                    <select name="role" class="form-control">
                        <option value="admin">مشرف</option>
                        <option value="cashier">محاسب</option>
                        <option value="inventory">المخزون</option>
                    </select>
                </div>

                <button class="btn btn-success w-100">انشاء المستخدم</button>
                <a href="/users"class="btn btn-secondary w-100 mt-2">رجوع</a>

            </form>

        </div>
    </div>

</div>

@endsection
@extends('layout')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>المستخدمين</h2>
        <a href="/users/create" class="btn btn-primary">مستخدم جديد +</a>
    </div>

    <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>الاسم</th>
                <th>الوظيفة</th>
                <th width="150">تفاعلات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>

                <td>
                    @if($user->role == 'admin')
                        <span class="badge bg-success">مشرف</span>
                    @elseif($user->role == 'cashier')
                        <span class="badge bg-primary">محاسب</span>
                    @elseif($user->role == 'inventory')
                        <span class="badge bg-warning text-dark">المخزون</span>
                    @endif
                </td>

                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-info">تعديل</a>

                    <form action="/users/{{ $user->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this user?')">
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
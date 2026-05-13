@extends('layout')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-4">
                        تعديل المستخدم
                    </h2>

                    <form method="POST" action="/users/{{ $user->id }}">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                اسم المستخدم
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $user->name }}">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                كلمة مرور جديدة
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="اتركه فارغ للحفاظ على كلمة المرور القديمة">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                الوظيفة
                            </label>

                            <select
                                name="role"
                                class="form-select">

                                <option
                                    value="admin"
                                    {{ $user->role == 'admin' ? 'selected' : '' }}>

                                    مشرف

                                </option>

                                <option
                                    value="cashier"
                                    {{ $user->role == 'cashier' ? 'selected' : '' }}>

                                    محاسب

                                </option>

                                <option
                                    value="inventory"
                                    {{ $user->role == 'inventory' ? 'selected' : '' }}>

                                    المخزون

                                </option>

                            </select>

                        </div>

                        <button class="btn btn-warning w-100">

                            تحديث المستخدم

                        </button>

                        <a
                            href="/users"
                            class="btn btn-secondary w-100 mt-2">

                            رجوع

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
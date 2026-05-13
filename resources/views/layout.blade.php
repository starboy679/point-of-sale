
<!DOCTYPE html>

<html lang="ar" dir="rtl">
    <head>
        <title>POS System</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
            <style>

        
        body{
            background:#f5f7fb;
            font-family: 'Cairo', sans-serif;
            direction: right;
            text-algin: right;
        }
        
        .table{
            text-algin: right;
        }
        .sidebar{
            width:240px;
            min-height:100vh;
            background:#111827;
        }

        .sidebar a{
            color:#d1d5db;
            text-decoration:none;
            display:block;
            padding:12px;
            border-radius:10px;
            margin-bottom:8px;
            transition:0.3s;
            text-algin: right;
        }

        .sidebar a:hover{
            background:#1f2937;
            color:white;
        }

        .sidebar .active{
            background:#2563eb;
            color:white;
        }

        .main-content{
            flex:1;
            padding:30px;
        }

        .card-box{
            background:white;
            border-radius:15px;
            padding:20px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
            text-align: right;

        }
        .nav-link{
            color:#d1d5db;
            display:block;
            text-decoration:none;
            padding:12px;
            margin-bottom:8px;
            border-radius:10px;
            transition:0.3s;
        }
        .nav-link:hover{
            background:#1f2937;
            color:white;
        }
        .list-group-item{
            text-algin: right;
        }
        .row{
            flex-direction: row-reverse;
        }

    </style>
    </head>
    <body>
        <div class="d-flex">
    @auth

    <div class="sidebar p-3">

        <h3 class="text-white fw-bold mb-4">
            نظام نقطة البيع
        </h3>
        
        @php
                $menu = [];
            if(auth()-> user()->role == 'admin'){
                $menu = [
                ['name' => 'لوحة التحكم', 'link' => '/dashboard'],
                ['name' => 'المنتجات', 'link' => '/products'],
                ['name' => 'المخزون', 'link' => '/inventory'],
                ['name' => 'نقطة البيع', 'link' => '/pos'],
                ['name' => 'المبيعات', 'link' => '/sales'],
                ['name' => 'المستخدمين', 'link' => '/users'],
                ['name' => 'التقارير', 'link' => '/reports'],
                ];
            }
            if(auth()-> user()->role == 'cashier'){
                $menu = [
                ['name' => 'نقطة البيع', 'link' => '/pos'],
                ];
            }
            if(auth()-> user()->role == 'inventory'){
                $menu = [
                ['name' => 'المخزون', 'link' => '/inventory'],
                ['name' => 'المنتجات', 'link' => '/products'],
                ];
            }

        @endphp
            
        <ul class="nav flex-column">

                @foreach($menu as $item)

            <li class="nav-item">

                <a href="{{ $item['link'] }}" class="nav-link">

                    {{ $item['name'] }}
                </a>

            </li>

        @endforeach

    </ul>
    <form method="POST" action="/logout">
    @csrf
            <button class="btn btn-danger w-100 mt-4">
                تسجيل الخروج
            </button>

        </form>
        
    </div>
    @endauth

    <div class="main-content">
    @yield('content')
    @yield('scripts')
    </div>
</div>
</body>
</html>

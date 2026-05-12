
<!DOCTYPE html>
<html>
    <head>
        <title>POS System</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <style>

        body{
            background:#f5f7fb;
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

    </style>
    </head>
    <body>
        <div class="d-flex">
    @auth

    <div class="sidebar p-3">

        <h3 class="text-white fw-bold mb-4">
            POS System
        </h3>
        
        @php
                $menu = [];
            if(auth()-> user()->role == 'admin'){
                $menu = [
                ['name' => 'Dashboard', 'link' => '/dashboard'],
                ['name' => 'Products', 'link' => '/products'],
                ['name' => 'Inventory', 'link' => '/inventory'],
                ['name' => 'POS', 'link' => '/pos'],
                ['name' => 'Sales', 'link' => '/sales'],
                ['name' => 'Users', 'link' => '/users'],
                ['name' => 'Reports', 'link' => '/reports'],
                ];
            }
            if(auth()-> user()->role == 'cashier'){
                $menu = [
                ['name' => 'POS', 'link' => '/pos'],
                ];
            }
            if(auth()-> user()->role == 'inventory'){
                $menu = [
                ['name' => 'Inventory', 'link' => '/inventory'],
                ['name' => 'Products', 'link' => '/products'],
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
                Logout
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

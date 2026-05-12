<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>

        body{
            background:#111883;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width:400px;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        .login-title{
            text-align:center;
            margin-bottom:30px;
            font-weight:bold;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .btn-login{
            border-radius:10px;
            padding:12px;
            font-weight:bold;
        }

    </style>

</head>

<body>

    <div class="login-card">

        <h2 class="login-title">

            POS System Login

        </h2>

        @if($errors->any())

            <div class="alert alert-danger">

                {{ $errors->first() }}

            </div>

        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Username

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-primary w-100 btn-login">

                Login

            </button>

        </form>

    </div>

</body>

</html>
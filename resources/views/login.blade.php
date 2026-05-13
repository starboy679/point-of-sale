<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:
            linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb);
            font-family:Cairo;
            overflow:hidden;
        }

        .bg-circle{
            position:absolute;
            width:500px;
            height:500px;
            background:rgba(255,255,255,0.05);
            border-radius:50%;
            top:-150px;
            left:-150px;
        }

        .bg-circle2{
            position:absolute;
            width:400px;
            height:400px;
            background:rgba(255,255,255,0.05);
            border-radius:50%;
            bottom:-120px;
            right:-120px;
        }
        .bg-circle3{
            position:absolute;
            width:300px;
            height:300px;
            background:rgba(255,255,255,0.05);
            border-radius:50%;
            bottom:190px;
            right:-30px;
        }

        .login-card{
            width:420px;
            background:white;
            border-radius:20px;
            padding:40px;
            box-shadow:0 20px 50px rgba(0,0,0,0.25);
            position:relative;
            z-index:10;
        }

        .system-title{
            text-align:center;
            font-size:34px;
            font-weight:bold;
            margin-bottom:10px;
            color:#1e293b;
        }

        .system-sub{
            text-align:center;
            color:#64748b;
            margin-bottom:30px;
        }

        .form-control{
            height:50px;
            border-radius:12px;
            margin-bottom:20px;
            text-align:right;
        }

        .btn-login{
            width:100%;
            height:50px;
            border:none;
            border-radius:12px;
            background:#2563eb;
            color:white;
            font-size:18px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn-login:hover{
            background:#1d4ed8;
        }

        .store-name{
            position:absolute;
            left:70px;
            top:50%;
            transform:translateY(-50%);
            font-size:90px;
            font-weight:bold;
            color:rgba(255, 255, 255, 0.29);
            user-select:none;
        }

        .icon-box{
            width:80px;
            height:80px;
            background:#eff6ff;
            margin:auto;
            border-radius:20px;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:35px;
            margin-bottom:20px;
        }

        @media(max-width:768px){
            .login-card{
                width:90%;
                padding:30px 20px;
            }
            .system-title{
                font-size:28px;
            }
            .system-name{
                font-size:55px;
                left:20px;
                opacity:0.08;
            }
        }
        @media(max-width:480){
            .login-card{
                width:92%;
                border-radius:16px;
            }
            .system-title{
                font-size:24px;
            }
            .system-sub{
                font-size:14px;
            }
            .form-control{
                height:45px;
            }
            .btn-login{
                height:45px;
                font-size:16px;
            }
            .store-name{
                display:none;
            }
        }

    </style>
</head>

<body>

<div class="bg-circle"><div class="store-name">الدكان</div></div>

<div class="bg-circle2"><div class="store-name">
    الدكان
</div></div>

<div class="store-name">
    الدكان
</div>

<div class="login-card">

    <div class="system-title">
        نظام المبيعات
    </div>

    <div class="system-sub">
        تسجيل الدخول للنظام
    </div>

    <form method="POST" action="/login">

        @csrf

        <input
            type="text"
            name="name"
            class="form-control"
            placeholder="اسم المستخدم"
            required
        >

        <input
            type="password"
            name="password"
            class="form-control"
            placeholder="كلمة المرور"
            required
        >

        <button class="btn-login">
            تسجيل الدخول
        </button>

    </form>
    

</div>
<div class="bg-circle3"><div class="store-name">الدكان</div></div>

</body>
</html>
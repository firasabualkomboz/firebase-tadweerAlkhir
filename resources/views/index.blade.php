@extends('layouts.auth')

@section('content')
    <style>
        .container {
          height: 200px;
          position: relative;
        }

        .center {
          margin: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
        }
        </style>


</head>
<body>

    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <img style="width: 25%" style="text-align: center" src="{{ asset('assets/dashboard/img/user_login.svg') }}">
        </div>
    </div>

@if (Route::has('login'))
<div class="center">
@auth

<a href="{{ url('/admin/categories') }}" class="text-sm text-gray-700 underline">الأنتقال إلى لوحة تدوير الخير</a>

@else

<a href="{{ route('login') }}" class="btn btn-primary text-center text-gray-700 underline">تسجيل الدخول إلى اللوحة</a>
@endauth
</div>
@endif


@endsection

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="login-page bg-body-secondar" style="background:#f5fffa;">

<div class="login-box">
    <div class="login-logo">
        <a href="#">{{ config('app.name') }}</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Sign in to start your session</p>

           
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Login failed</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li style="font-size: 14px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control" placeholder="Email" required autofocus>
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password"
                        class="form-control" placeholder="Password" required>
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember"> Remember Me </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </div>
                </div>
            </form>
            <p class="mb-1">
                <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>

        </div>
    </div>
</div>

<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
</body>
</html>


{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .login-container {
            
            margin-top: 60px;
        }

        .login-image {
            background: url('{{ asset('assets/frontend/assets/img/2.jpg') }}') center center/cover no-repeat;
            min-height: 420px;
            border-radius: 10px 0 0 10px;
        }

        @media(max-width: 767px) {
            .login-image {
                display: none;
            }
        }
    </style>
</head>

<body class=" " style="background:#d5fcf3;">

    <div class="container login-container">
        <div class="row shadow rounded overflow-hidden">

        
            <div class="col-md-6 login-image"></div>

            
            <div class="col-md-6 bg-white p-4">

                <div class="text-center mb-3">
                    <h3 class="fw-bold">{{ config('app.name') }}</h3>
                    <p class="text-muted">Sign in to start your session</p>
                </div>

                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Login failed</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                        <li style="font-size: 14px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

               
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Email" required autofocus>
                        <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember"> Remember Me </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </div>
                    </div>
                </form>

                <p class="mt-3 mb-0 text-center">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>

</body>

</html> --}}

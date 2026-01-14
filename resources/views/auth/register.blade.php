<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register | {{ config('app.name') }}</title>

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

            <p class="login-box-msg">Create a new account</p>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Register failed</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li style="font-size:14px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Register Form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="form-control" placeholder="Full Name" required>
                    <div class="input-group-text">
                        <span class="bi bi-person"></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control" placeholder="Email" required>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control" placeholder="Password" required>
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                           class="form-control" placeholder="Confirm Password" required>
                    <div class="input-group-text">
                        <span class="bi bi-lock"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('login') }}">Already have account?</a>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success w-100">
                            Register
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
</body>
</html>

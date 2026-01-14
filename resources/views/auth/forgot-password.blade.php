<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Forgot Password | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="login-page bg-body-secondary">

    <div class="login-box">

        <!-- Logo -->
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">

                <h4 class="text-center mb-3">Forgot Password</h4>
                <p class="text-muted text-center">
                    Enter your email to receive a password reset link.
                </p>

                <!-- Session Status Message -->
                <x-auth-session-status class="mb-3" :status="session('status')" />

                <!-- FORM START -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="input-group mb-3">
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email Address"
                               value="{{ old('email') }}"
                               required autofocus>

                        <div class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-block">
                            Send Reset Link
                        </button>
                    </div>

                </form>
                <!-- FORM END -->

                <div class="mt-3 text-center">
                    <a href="{{ route('login') }}">← Back to login</a>
                </div>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>

</body>

</html>

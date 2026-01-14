<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reset Password | {{ config('app.name') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

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

                <h4 class="text-center mb-3">Reset Password</h4>

                <p class="text-muted text-center mb-4">
                    Enter your new password and confirm it.
                </p>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div class="input-group mb-3">
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email Address"
                               value="{{ old('email', $request->email) }}"
                               required autofocus autocomplete="username">

                        <div class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="New Password"
                               required autocomplete="new-password">

                        <div class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group mb-4">
                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               class="form-control"
                               placeholder="Confirm Password"
                               required autocomplete="new-password">

                        <div class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </div>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-block">
                            Reset Password
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>





</body>
</html>

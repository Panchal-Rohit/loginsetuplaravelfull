<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Password Confirmation | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="login-page bg-body-secondary">

<x-guest-layout>

    <div class="login-box">

        <div class="login-logo">
            <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">

                <h4 class="text-center mb-3">Confirm Password</h4>

                <p class="text-muted text-center mb-4">
                    This is a secure area. Please confirm your password before continuing.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter Password"
                               required autocomplete="current-password">

                        <div class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary btn-block">
                            Confirm
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</x-guest-layout>

<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>

</body>

</html>

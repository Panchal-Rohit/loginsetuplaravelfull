@extends('admin.layouts.app')

@push('title')
User Profile
@endpush

@section('content')

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">User Profile</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">

                <!-- PROFILE UPDATE -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h4>Edit Profile</h4></div>

                        <div class="card-body">

                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <!-- Current Profile Image -->
                                <div class="text-center mb-3">
                                    <img src="{{ $user->profile_image 
                                        ? asset('storage/'.$user->profile_image) 
                                        : asset('assets/admin/assets/img/default-user.png') }}"
                                        width="130" height="130" class="rounded-circle">
                                </div>

                                <!-- Upload New Image -->
                                <div class="mb-3">
                                    <label>Upload Profile Image</label>
                                    <input type="file" name="profile_image" class="form-control">
                                </div>

                                <!-- Name -->
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{ $user->name }}" required>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"
                                           value="{{ $user->email }}" required>
                                </div>

                                <button class="btn btn-primary w-100">Save Changes</button>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- PASSWORD UPDATE -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h4>Change Password</h4></div>

                        <div class="card-body">
                            <form action="{{ route('profile.password') }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="mb-3">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <button class="btn btn-warning w-100">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</main>

@endsection

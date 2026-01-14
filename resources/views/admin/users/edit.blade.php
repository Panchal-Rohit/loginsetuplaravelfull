@extends('admin.layouts.app')
@push('title')
User Controller
@endpush
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Edit User Role</h3>
    </div>

    <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" value="{{ $user->name }}" disabled>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success">Update Role</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

@endsection
@extends('admin.layouts.app')

@push('title')
    Permission Management
@endpush

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">All Permission</h3>
                    </div>

                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.permissions.index') }}">
                    <label class="mb-1"><strong>Select Role</strong></label>
                    <select name="role_id" class="form-control" onchange="this.form.submit()">
                        @foreach ($roles as $r)
                            <option value="{{ $r->id }}" {{ $roleId == $r->id ? 'selected' : '' }}>
                                {{ ucfirst($r->name) }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        {{-- PERMISSIONS FORM (POST) --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Permissions for:
                    <strong>{{ ucfirst($role->name) }}</strong>
                </h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.permissions.update') }}">
                    @csrf
                    <input type="hidden" name="role_id" value="{{ $role->id }}">

                    @foreach ($permissions->groupBy('group') as $group => $items)
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>{{ $group }}</strong>
                            </div>

                            <div class="card-body">
                                @foreach ($items as $permission)
                                    <div class="form-check mb-1">
                                        <input type="checkbox" class="form-check-input" name="permissions[]"
                                            value="{{ $permission->id }}" {{-- Normal roles --}}
                                            {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                                            {{-- Super Admin --}}
                                            {{ $role->name === 'super_admin' ? 'checked disabled' : '' }}>

                                        <label class="form-check-label">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    {{-- SAVE BUTTON --}}
                    <button class="btn btn-primary mt-2" {{ $role->name === 'super_admin' ? 'disabled' : '' }}>
                        Save Permissions
                    </button>

                    {{-- SUPER ADMIN INFO --}}
                    @if ($role->name === 'super_admin')
                        <div class="text-muted mt-2">
                            <small>
                                Super Admin has all permissions by default and cannot be modified.
                            </small>
                        </div>
                    @endif

                </form>
            </div>
        </div>

       
    </main>
@endsection

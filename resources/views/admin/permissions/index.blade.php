@extends('admin.layouts.app')

@push('title')
    Permission Management
@endpush


@section('content')
    {{-- FORM CARD (TOP) --}}
    <div class="card mb-4">

        <div class="col-12 ">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
            </div>

            <form method="POST" action="{{ route('admin.permissions.update') }}">
                @csrf

                <select name="role_id" class="form-control mb-3" onchange="this.form.submit()">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>

                @foreach ($permissions->groupBy('group') as $group => $items)
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ $group }}</strong>
                        </div>

                        <div class="card-body">
                            @foreach ($items as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                    <label>{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <button class="btn btn-primary mt-3">Save Permissions</button>
            </form>


        </div>
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">All Roles</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Role Name</th>
                            <th width="160">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $role->name }}
                                    </span>
                                </td>
                                <td>


                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete role?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">
                                    No roles found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- TABLE CARD (BOTTOM) --}}
@endsection

@extends('admin.layouts.app')

@push('title')
Role Management
@endpush

@section('content')

{{-- FORM CARD (TOP) --}}
<div class="card mb-4">

    <div class="col-12 ">
        <div class="card-header">
            <h3 class="card-title">All Users</h3>
        </div>

        <form method="POST" action="{{ isset($editRole)
                        ? route('admin.roles.update', $editRole->id)
                        : route('admin.roles.store') }}">
            @csrf
            @isset($editRole)
            @method('PUT')
            @endisset

            <div class="card-body">
                <div class="form-group">
                    <label>Role Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $editRole->name ?? '') }}"
                        required>

                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">
                    {{ isset($editRole) ? 'Update Role' : 'Save Role' }}
                </button>

                @isset($editRole)
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
                @endisset
            </div>
        </form>
    </div>
</div>
<div class="col-12">
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
                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                Edit
                            </a>

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
</div>

{{-- TABLE CARD (BOTTOM) --}}
<div class="row">

</div>

@endsection
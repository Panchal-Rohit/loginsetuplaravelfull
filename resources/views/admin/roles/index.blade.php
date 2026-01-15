@extends('admin.layouts.app')

@push('title')
Role Management
@endpush


@section('content')


{{-- FORM CARD (TOP) --}}
<div class="card mb-4">
    {{-- 🔐 CREATE / EDIT ROLE (ONLY MANAGE PERMISSION) --}}
    @if(can('roles.manage'))
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">
                {{ isset($editRole) ? 'Edit Role' : 'Create Role' }}
            </h3>
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
                    <input type="text" name="name" class="form-control" value="{{ old('name', $editRole->name ?? '') }}"
                        required>
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
    @endif


    {{-- 👀 ROLE LIST (VIEW PERMISSION REQUIRED) --}}
    @if(can('roles.view'))
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

                        {{-- Action column only if manage --}}
                        @if(can('roles.manage'))
                        <th width="160">Action</th>
                        @endif
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

                        {{-- DELETE / EDIT ONLY IF MANAGE --}}
                        @if(can('roles.manage'))
                        <td>
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete role?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                        @endif
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
            @if($roles->hasPages())
            <div class="mt-3">
                {{ $roles->links() }}
            </div>
            @endif

        </div>
    </div>
    @endif
</div>

{{-- TABLE CARD (BOTTOM) --}}
@endsection
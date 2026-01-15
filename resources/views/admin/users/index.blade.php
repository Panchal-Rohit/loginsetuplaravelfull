@extends('admin.layouts.app')

@push('title')
User Controller
@endpush

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Users</h3>
    </div>



    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th width="80">Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>

                    {{-- PROFILE IMAGE --}}
                    <td>
                        <div class="text-center mb-3">
                            <img src="{{ !empty($user->profile_image) && file_exists(public_path('storage/'.$user->profile_image))
                ? asset('storage/'.$user->profile_image)
                : asset('assets/admin/assets/img/default-user.png') }}" alt="Null" width="50" height="50"
                                class="rounded-circle" style="object-fit:cover;">
                        </div>

                    </td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <span class="badge bg-info">
                            {{ $user->role->name ?? 'No Role' }}
                        </span>
                    </td>

                    <td>

                        {{-- EDIT --}}
                        @if(can('users.edit'))
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        @endif

                        {{-- DELETE --}}
                        @if(can('users.delete'))
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete user?')">
                                Delete
                            </button>
                        </form>
                        @endif

                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        @if($users->hasPages())
        <div class="mt-3">
            {{ $users->links() }}
        </div>
        @endif
    </div>
</div>

@endsection
@extends('admin.layouts.app')

@push('title')
    Role Management
@endpush


@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">All Category</h3>
                    </div>

                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        @if (can('category.manage'))
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md">
                            <div class="card card-secondary card-outline mb-4">
                                <div class="card-header">
                                    <div class="card-title">Category</div>
                                </div>

                                <form method="POST" action="{{ route('admin.categories.store') }}">
                                    @csrf
                                    <div class="card-body ">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter category name" required>
                                            </div>
                                        </div>

                                        <div class="col-md mt-2">
                                            <button class="btn btn-primary ">Save Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- CREATE SUB CATEGORY --}}
                        <div class="col-md-6">
                            <!--begin::Different Height-->
                            <div class="card card-secondary card-outline mb-4">
                                <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Sub Category</div>
                                </div>

                                <form method="POST" action="{{ route('admin.subcategories.store') }}">
                                    @csrf
                                    <div class="card-body row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Main Category</label>
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub Category Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter sub category name" required>
                                            </div>
                                        </div>

                                        <div class="col-md mt-2">
                                            <button class="btn btn-primary ">Save Sub Category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        @endif


        {{-- ===================== --}}
        {{-- 📋 CATEGORY TABLE --}}
        {{-- ===================== --}}
        @if (can('category.view'))
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Bordered Table</h3>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="60">ID</th>
                                                <th>Category Name</th>
                                                <th width="120">Sub Count</th>

                                                @if (can('category.manage'))
                                                    <th width="120">Action</th>
                                                @endif
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($categories as $cat)
                                                <tr>
                                                    <td>{{ $cat->id }}</td>
                                                    <td>
                                                        <span class="badge bg-info">{{ $cat->name }}</span>
                                                    </td>
                                                    <td>{{ $cat->sub_categories_count }}</td>

                                                    @if (can('category.manage'))
                                                        <td>
                                                            <form method="POST"
                                                                action="{{ route('admin.categories.destroy', $cat->id) }}"
                                                                onsubmit="return confirm('Delete category? All sub categories will be deleted!')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No categories found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{-- ===================== --}}
        {{-- 📋 SUB CATEGORY TABLE --}}
        {{-- ===================== --}}
        @if (can('category.view'))
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h3 class="card-title">Bordered Table</h3>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="60">ID</th>
                                                <th>Sub Category</th>
                                                <th>Main Category</th>

                                                @if (can('category.manage'))
                                                    <th width="120">Action</th>
                                                @endif
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($subCategories as $sub)
                                                <tr>
                                                    <td>{{ $sub->id }}</td>
                                                    <td>{{ $sub->name }}</td>
                                                    <td>
                                                        <span class="badge bg-info">
                                                            {{ $sub->category->name ?? 'N/A' }}
                                                        </span>
                                                    </td>

                                                    @if (can('category.manage'))
                                                        <td>
                                                            <form method="POST"
                                                                action="{{ route('admin.subcategories.destroy', $sub->id) }}"
                                                                onsubmit="return confirm('Delete sub category?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No sub categories
                                                        found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </main>


@endsection

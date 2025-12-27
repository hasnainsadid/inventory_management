@extends('backend.layouts.app')
@section('title', 'Supplier')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">All Recycle Suppliers</h5>
            <div class="table-responsive text-nowrap">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>
                                    {{ $supplier->address }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base ti tabler-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form id="restore-form-{{ $supplier->id }}"
                                                action="{{ route('suppliers.restore', $supplier->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                onclick="event.preventDefault(); document.getElementById('restore-form-{{ $supplier->id }}').submit();">
                                                <i class="icon-base ti tabler-restore me-1"></i> Restore
                                            </a>

                                            <a class="dropdown-item waves-effect" onclick="deleteData({{ $supplier->id }})"
                                                href="javascript:void(0);"><i class="icon-base ti tabler-trash me-1"></i>
                                                Delete</a>
                                            <form id="delete-form-{{ $supplier->id }}"
                                                action="{{ route('suppliers.forceDelete', $supplier->id) }}" method="post"
                                                class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No recycle suppliers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

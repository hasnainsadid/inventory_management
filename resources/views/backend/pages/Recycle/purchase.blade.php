@extends('backend.layouts.app')
@section('title', 'Purchases')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">All Recycle Purchases</h5>
            <div class="table-responsive text-nowrap">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Invoice No</th>
                            <th>Purchase Date</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->supplier->name }}</td>
                                <td>{{ $purchase->invoice_no }}</td>
                                <td>{{ Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') }}</td>
                                <td>{{ $purchase->total_amount }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base ti tabler-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form id="restore-form-{{ $purchase->id }}"
                                                action="{{ route('purchases.restore', $purchase->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                onclick="event.preventDefault(); document.getElementById('restore-form-{{ $purchase->id }}').submit();">
                                                <i class="icon-base ti tabler-restore me-1"></i> Restore
                                            </a>

                                            <a class="dropdown-item waves-effect" onclick="deleteData({{ $purchase->id }})"
                                                href="javascript:void(0);"><i class="icon-base ti tabler-trash me-1"></i>
                                                Delete</a>
                                            <form id="delete-form-{{ $purchase->id }}"
                                                action="{{ route('purchases.forceDelete', $purchase->id) }}" method="post"
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
                                <td colspan="5" class="text-center">No recycle purchases found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

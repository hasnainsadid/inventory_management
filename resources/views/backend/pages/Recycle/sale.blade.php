@extends('backend.layouts.app')
@section('title', 'Sale')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">All Recycle Sales</h5>
            <div class="table-responsive text-nowrap">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Invoice No</th>
                            <th>Sale Date</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($sales as $sale)
                            <tr>
                                <td>{{ $sale->customer_name }}</td>
                                <td>{{ $sale->invoice_no }}</td>
                                <td>{{ Carbon\Carbon::parse($sale->sale_date)->format('d M, Y') }}</td>
                                <td>{{ $sale->total_amount }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base ti tabler-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form id="restore-form-{{ $sale->id }}"
                                                action="{{ route('sales.restore', $sale->id) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                            <a class="dropdown-item waves-effect" href="javascript:void(0);"
                                                onclick="event.preventDefault(); document.getElementById('restore-form-{{ $sale->id }}').submit();">
                                                <i class="icon-base ti tabler-restore me-1"></i> Restore
                                            </a>

                                            <a class="dropdown-item waves-effect" onclick="deleteData({{ $sale->id }})"
                                                href="javascript:void(0);"><i class="icon-base ti tabler-trash me-1"></i>
                                                Delete</a>
                                            <form id="delete-form-{{ $sale->id }}"
                                                action="{{ route('sales.forceDelete', $sale->id) }}" method="post"
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
                                <td colspan="5" class="text-center">No recycle sales found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('backend.layouts.app')
@section('title', 'Sales')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Sales</h5>
                @if (hasPermission(['sales.create']))
                    {{-- <button class="btn btn-primary btn-sm mx-5">Add New</button> --}}
                    <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm mx-5">
                        Add New
                    </a>
                @endif
            </div>
            <div class="table-responsive text-nowrap">
                {!! $dataTable->table(['class' => 'table'], true) !!}
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
@endsection

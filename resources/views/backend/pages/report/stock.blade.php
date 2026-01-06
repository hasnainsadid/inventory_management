@extends('backend.layouts.app')
@section('title', 'Stock Report')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Stock Report</h5>
                {{-- <button class="btn btn-primary btn-sm mx-5" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Add New</button> --}}
            </div>
            <div class="table-responsive text-nowrap">
                {!! $dataTable->table(['class' => 'table'], true) !!}
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
@endsection

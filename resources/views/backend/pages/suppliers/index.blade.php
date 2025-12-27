@extends('backend.layouts.app')
@section('title', 'Suppliers')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Suppliers</h5>
                <button class="btn btn-primary btn-sm mx-5" data-bs-toggle="modal" data-bs-target="#addSupplierModal">Add New</button>
            </div>
            <div class="table-responsive text-nowrap">
                {!! $dataTable->table(['class' => 'table'], true) !!}
            </div>
        </div>

        <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="name" name="name" required
                                            placeholder="Enter Name" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" name="email" id="email" class="form-control" required placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="phone" id="phone" class="form-control" required placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea name="address" id="address"  class="form-control" required placeholder="Enter Address"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editSupplierModal" tabindex="-1" data-bs-backdrop="static">
            <div class="modal-dialog modal-md">
                <form id="supplier_form">
                    @csrf
                    @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Edit Supplier</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" id="edit_id">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" id="edit_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" id="edit_email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" id="edit_phone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <textarea name="address" id="edit_address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {!! $dataTable->scripts() !!}
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-btn', function() {

                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('suppliers.edit', ':id') }}".replace(':id', id),
                    type: 'GET',
                    success: function(res) {

                        $('#edit_id').val(res.id);
                        $('#edit_name').val(res.name);
                        $('#edit_email').val(res.email);
                        $('#edit_phone').val(res.phone);
                        $('#edit_address').val(res.address);

                        $('#editSupplierModal').modal('show');
                    },
                    error: function() {
                        alert('Unable to fetch category data');
                    }
                });

            });

            $('#supplier_form').submit(function(e) {
                e.preventDefault();

                let id = $('#edit_id').val();
                
                $.ajax({
                    url: "{{ route('suppliers.update', ':id') }}".replace(':id', id),
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'PUT',
                        name: $('#edit_name').val(),
                        email: $('#edit_email').val(),
                        phone: $('#edit_phone').val(),
                        address: $('#edit_address').val(),
                    },
                    success: function() {
                        $('#editSupplierModal').modal('hide');
                        $('.dataTable').DataTable().ajax.reload(null, false);
                    }
                });
            });
        })
    </script>
@endpush

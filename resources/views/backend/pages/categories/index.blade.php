@extends('backend.layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Categories</h5>
                @if (hasPermission(['categories.create'])) 
                    <button class="btn btn-primary btn-sm mx-5" data-bs-toggle="modal" data-bs-target="#categoryAddModal">Add New</button>
                @endif
            </div>
            <div class="table-responsive text-nowrap">
                {!! $dataTable->table(['class' => 'table'], true) !!}
            </div>
        </div>

        <div class="modal fade" id="categoryAddModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option disabled selected>Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editCategoryModal" tabindex="-1" data-bs-backdrop="static">
            <div class="modal-dialog modal-md">
                <form id="categoryForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Edit Category</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" id="edit_id">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" id="edit_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Status</label>
                                <select id="edit_status" class="form-select">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
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
                    url: "{{ route('categories.edit', ':id') }}".replace(':id', id),
                    type: 'GET',
                    success: function(res) {

                        $('#edit_id').val(res.id);
                        $('#edit_name').val(res.name);
                        $('#edit_status').val(res.status);

                        $('#editCategoryModal').modal('show');
                    },
                    error: function() {
                        alert('Unable to fetch category data');
                    }
                });

            });

            $('#categoryForm').submit(function(e) {
                e.preventDefault();

                let id = $('#edit_id').val();
                
                $.ajax({
                    url: "{{ route('categories.update', ':id') }}".replace(':id', id),
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: 'PUT',
                        name: $('#edit_name').val(),
                        status: $('#edit_status').val(),
                    },
                    success: function() {
                        $('#editCategoryModal').modal('hide');
                        $('.dataTable').DataTable().ajax.reload(null, false);
                    }
                });
            });
        })
    </script>
@endpush

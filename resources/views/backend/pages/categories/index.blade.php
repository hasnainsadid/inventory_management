@extends('backend.layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Categories</h5>
                <button class="btn btn-primary btn-sm mx-5" data-bs-toggle="modal" data-bs-target="#categoryAddModal">Add
                    New</button>
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
                            <h5>Edit Category Data id: </h5>
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
                var id = $(this).data('id');
                var name = $(this).data('name');
                var status = $(this).data('status');
                $('#category_id').val(id);
                $('#name').val(name);
                $('#status').val(status);
                $('#editCategoryModal').modal('show');
            });

            $('#categoryForm').submit(function(e) {
                e.preventDefault();
                var id = $('#category_id').val();
                var name = $('#ename').val();
                var status = $('#estatus').val();
                $.ajax({
                    url: '/admin/categories/' + id,
                    type: 'PUT',
                    data: {
                        id: id,
                        name: name,
                        status: status,
                    },
                    success: function(response) {
                        $('#editCategoryModal').modal('hide');
                        $('#categoryForm')[0].reset();
                        $('#category-table').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '';
                        $.each(errors, function(key, value) {
                            errorHtml += '<li>' + value + '</li>';
                        });
                        $('#error-message').html(errorHtml);
                        $('#error-modal').modal('show');
                    }
                });
            });
        })
    </script>
@endpush

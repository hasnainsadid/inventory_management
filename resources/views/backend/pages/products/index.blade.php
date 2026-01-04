@extends('backend.layouts.app')
@section('title', 'Products')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Products</h5>
                @if (hasPermission(['products.create']))
                    <button class="btn btn-primary btn-sm mx-5" data-bs-toggle="modal" data-bs-target="#productAddModal">Add
                        New</button>
                @endif
            </div>
            <div class="table-responsive text-nowrap">
                {!! $dataTable->table(['class' => 'table'], true) !!}
            </div>
        </div>

        <div class="modal fade" id="productAddModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sku">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku"
                                            placeholder="Enter SKU" />
                                    </div>
                                </div>

                                @php
                                    $categories = App\Models\Category::all();
                                @endphp
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="category_id">Category</label>
                                        <select class="form-select" id="category_id" name="category_id">
                                            <option disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="unit">Unit</label>
                                        <input type="text" class="form-control" id="unit" name="unit"
                                            placeholder="Enter Unit" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="alert_quantity">Alert Quantity</label>
                                        <input type="text" class="form-control" id="alert_quantity" name="alert_quantity"
                                            placeholder="Enter Alert Quantity" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="purchase_price">Purchase Price</label>
                                        <input type="text" class="form-control" id="purchase_price" name="purchase_price"
                                            placeholder="Enter Purchase Price" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="sale_price">Sale Price</label>
                                        <input type="text" class="form-control" id="sale_price" name="sale_price"
                                            placeholder="Enter Sale Price" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editProductModal" tabindex="-1" data-bs-backdrop="static">
            <div class="modal-dialog modal-md">
                <form id="productForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Edit Product</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" id="edit_id">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_name">Name</label>
                                        <input type="text" class="form-control" id="edit_name" name="name"
                                            placeholder="Enter Name" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_sku">SKU</label>
                                        <input type="text" class="form-control" id="edit_sku" name="sku"
                                            placeholder="Enter SKU" />
                                    </div>
                                </div>

                                @php
                                    $categories = App\Models\Category::all();
                                @endphp
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_category_id">Category</label>
                                        <select class="form-select" id="edit_category_id" name="category_id">
                                            <option disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_unit">Unit</label>
                                        <input type="text" class="form-control" id="edit_unit" name="unit"
                                            placeholder="Enter Unit" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_alert_quantity">Alert Quantity</label>
                                        <input type="text" class="form-control" id="edit_alert_quantity"
                                            name="alert_quantity" placeholder="Enter Alert Quantity" />
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_purchase_price">Purchase Price</label>
                                        <input type="text" class="form-control" id="edit_purchase_price"
                                            name="purchase_price" placeholder="Enter Purchase Price" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_sale_price">Sale Price</label>
                                        <input type="text" class="form-control" id="edit_sale_price"
                                            name="sale_price" placeholder="Enter Sale Price" />
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="mb-3">
                                        <label class="form-label" for="edit_image">Image</label>
                                        <input type="file" class="form-control" id="edit_image" name="image" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="current_image">Current Image</label>
                                        <img src="" id="current_image" alt="product_image" height="50"
                                            width="50">
                                    </div>
                                </div>
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
                    url: "{{ route('products.edit', ':id') }}".replace(':id', id),
                    type: 'GET',
                    success: function(res) {

                        $('#edit_id').val(res.id);
                        $('#edit_name').val(res.name);
                        $('#edit_sku').val(res.sku);
                        $('#edit_unit').val(res.unit);
                        $('#edit_alert_quantity').val(res.alert_quantity);
                        $('#edit_purchase_price').val(res.purchase_price);
                        $('#edit_sale_price').val(res.sale_price);
                        $('#edit_category_id').val(res.category_id);
                        if (res.image) {
                            $('#current_image').attr(
                                'src',
                                "{{ asset('storage') }}/" + res.image
                            );
                        }
                        $('#editProductModal').modal('show');
                    },
                    error: function() {
                        alert('Unable to fetch product data');
                    }
                });

            });

            $('#productForm').submit(function(e) {
                e.preventDefault();

                let id = $('#edit_id').val();
                let formData = new FormData(this);

                formData.append('_method', 'PUT');

                $.ajax({
                    url: "{{ route('products.update', ':id') }}".replace(':id', id),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function() {
                        $('#editProductModal').modal('hide');
                        $('.dataTable').DataTable().ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        alert('Update failed');
                    }
                });
            });
        })
    </script>
@endpush

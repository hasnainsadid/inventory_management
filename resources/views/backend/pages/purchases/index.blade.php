@extends('backend.layouts.app')
@section('title', 'Purchase')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">All Purchase</h5>
                @if (hasPermission(['purchase.create']))
                    {{-- <button class="btn btn-primary btn-sm mx-5">Add New</button> --}}
                    <a href="{{ route('purchases.create') }}" class="btn btn-primary btn-sm mx-5">
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

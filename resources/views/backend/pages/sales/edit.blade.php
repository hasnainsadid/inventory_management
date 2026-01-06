@extends('backend.layouts.app')

@section('title', 'Edit Sale')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">Edit Sale</h5>
                @if (hasPermission(['sales.index']))
                    <a href="{{ route('sales.index') }}" class="btn btn-primary btn-sm mx-5">
                        All Sales
                    </a>
                @endif
            </div>

            <div class="card-body">
                <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Customer Name / Invoice / Date --}}
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="customerName">Customer Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="customer_name" id="customerName" class="form-control"
                                value="{{ $sale->customer_name }}" required placeholder="Enter customer name">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Invoice No</label>
                            <input type="text" name="invoice_no" class="form-control" value="{{ $sale->invoice_no }}"
                                readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Sale Date <span class="text-danger">*</span></label>
                            <input type="date" name="sale_date" class="form-control"
                                value="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d') }}" required>
                        </div>
                    </div>

                    {{-- Sale Items Table --}}
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="30%">Product</th>
                                    <th width="15%">Qty</th>
                                    <th width="20%">Price</th>
                                    <th width="20%">Subtotal</th>
                                    <th width="5%">
                                        <button type="button" class="btn btn-sm btn-primary" id="addRow">+</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="purchaseItems">
                                @foreach ($sale->items as $item)
                                    <tr>
                                        <td>
                                            <select name="product[]" class="form-select product select2" required>
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}"
                                                        data-price="{{ $product->purchase_price }}"
                                                        {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" class="form-control qty" min="1"
                                                value="{{ $item->quantity }}" required>
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" class="form-control price" step="0.01"
                                                value="{{ $item->price }}" required>
                                        </td>
                                        <td>
                                            <input type="number" name="subtotal[]" class="form-control subtotal"
                                                value="{{ $item->subtotal }}" readonly>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger removeRow">×</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Total Amount --}}
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-4">
                            <label class="form-label">Total Amount</label>
                            <input type="number" name="total_amount" id="totalAmount" class="form-control"
                                value="{{ $sale->total_amount }}" readonly>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Purchase</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function calculateTotal() {
            let total = 0;
            $('.subtotal').each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            $('#totalAmount').val(total.toFixed(2));
        }

        // qty or price change → update subtotal
        $(document).on('input', '.qty, .price', function() {
            let row = $(this).closest('tr');
            let qty = row.find('.qty').val();
            let price = row.find('.price').val();
            let subtotal = (qty * price) || 0;
            row.find('.subtotal').val(subtotal.toFixed(2));
            calculateTotal();
        });

        // product change → auto set purchase price
        $(document).on('change', '.product', function() {
            let row = $(this).closest('tr');
            let price = $(this).find(':selected').data('price') || 0;
            row.find('.price').val(price);
            row.find('.qty').trigger('input');
        });

        // add new row
        $('#addRow').click(function() {
            let row = $('#purchaseItems tr:first').clone();
            row.find('input').val('');
            row.find('select').removeClass('select2-hidden-accessible')
                .next('.select2').remove();
            $('#purchaseItems').append(row);

            $('#purchaseItems tr:last .select2').select2();
        });

        // remove row
        $(document).on('click', '.removeRow', function() {
            if ($('#purchaseItems tr').length > 1) {
                $(this).closest('tr').remove();
                calculateTotal();
            }
        });
    </script>
@endpush

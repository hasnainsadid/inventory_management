<?php
namespace App\Http\Controllers\Backend;

use App\DataTables\SaleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SaleDataTable $dataTable)
    {
        return $dataTable->render('backend.pages.sales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'products' => Product::all(),
        ];
        return view('backend.pages.sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'invoice_no'   => 'required',
            'sale_date'    => 'required|date',
            'product.*'    => 'required|exists:products,id',
            'quantity.*'   => 'required|numeric|min:1',
            'price.*'      => 'required|numeric|min:0',
            'subtotal.*'   => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
        ]);

        if ($validated->fails()) {
            notify()->error($validated->errors()->first());
            return back()->withInput();
        }

        DB::beginTransaction();

        try {
            // 🔹 Create Sale
            $sale = Sale::create([
                'customer_name' => $request->customer_name,
                'invoice_no'    => $request->invoice_no,
                'sale_date'     => $request->sale_date,
                'total_amount'  => $request->total_amount,
                'created_by'    => auth()->user()->name,
            ]);

            // 🔹 Loop products
            foreach ($request->product as $key => $productId) {

                // Create sale item
                $sale->items()->create([
                    'product_id' => $productId,
                    'quantity'   => $request->quantity[$key],
                    'price'      => $request->price[$key],
                    'subtotal'   => $request->subtotal[$key],
                ]);

                // 🔹 Update stock
                $stock = ProductStock::firstOrCreate(
                    ['product_id' => $productId],
                    ['stock' => 0]
                );

                if ($stock->stock < $request->quantity[$key]) {
                    throw new \Exception('Insufficient stock for selected product.');
                }

                $stock->decrement('stock', $request->quantity[$key]);
            }

            DB::commit();
            notify()->success('Sale created successfully');
            return redirect()->route('sales.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            notify()->error($th->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'sale'     => Sale::with('items')->findOrFail($id),
            'products' => Product::all(),
        ];
        return view('backend.pages.sales.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(), [
            'customer_name' => 'required',
            'invoice_no'    => 'required',
            'sale_date'     => 'required|date',
            'product.*'     => 'required|exists:products,id',
            'quantity.*'    => 'required|numeric|min:1',
            'price.*'       => 'required|numeric|min:0',
            'subtotal.*'    => 'required|numeric|min:0',
            'total_amount'  => 'required|numeric|min:0',
        ]);

        if ($validated->fails()) {
            notify()->error($validated->errors()->first());
            return back()->withInput();
        }

        DB::beginTransaction();

        try {
            $sale = Sale::with('items')->findOrFail($id);

            // Step 1: Rollback stock for old items (reduce previously added stock)
            foreach ($sale->items as $item) {
                $stock_old = ProductStock::firstWhere('product_id', $item->product_id);
                if ($stock_old) {
                    $stock_old->increment('stock', $item->quantity);
                }
            }

            // Step 2: Update sale
            $sale->update([
                'customer_name' => $request->customer_name,
                'invoice_no'    => $request->invoice_no,
                'sale_date'     => $request->sale_date,
                'total_amount'  => $request->total_amount,
                'created_by'    => auth()->user()->name,
            ]);

            $sale->items()->delete();

            // Step 3: Update sale items
            foreach ($request->product as $key => $product_id) {
                $sale->items()->create([
                    'product_id' => $product_id,
                    'quantity'   => $request->quantity[$key],
                    'price'      => $request->price[$key],
                    'subtotal'   => $request->subtotal[$key],
                ]);

                // 🔹 Update stock
                $stock_update = ProductStock::firstOrCreate(
                    ['product_id' => $product_id],
                    ['stock' => 0]
                );

                if ($stock_update->stock < $request->quantity[$key]) {
                    throw new \Exception('Insufficient stock for selected product.');
                }

                $stock_update->decrement('stock', $request->quantity[$key]);
            }

            DB::commit();
            notify()->success('Sale updated successfully');
            return redirect()->route('sales.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            notify()->error($th->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $sale = Sale::with('items')->findOrFail($id);

            // Rollback stock
            foreach ($sale->items as $item) {
                $stock = ProductStock::where('product_id', $item->product_id)->first();
                if ($stock) {
                    $stock->increment('stock', $item->quantity);
                }
            }

            $sale->items()->delete();
            $sale->delete();

            DB::commit();
            notify()->success('Sale deleted successfully');
            return redirect()->route('sales.index');
        } catch (\Exception $e) {
            DB::rollBack();
            notify()->error('Something went wrong! ' . $e->getMessage());
            return back();
        }
    }
}

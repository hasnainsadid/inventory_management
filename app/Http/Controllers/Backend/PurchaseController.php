<?php
namespace App\Http\Controllers\Backend;

use App\DataTables\PurchaseDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PurchaseDataTable $dataTable)
    {
        return $dataTable->render('backend.pages.purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'products'  => Product::all(),
            'suppliers' => Supplier::all(),
        ];
        return view('backend.pages.purchases.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'supplier_id'   => 'required',
            'invoice_no'    => 'required',
            'purchase_date' => 'required',
            'product.*'     => 'required',
            'quantity.*'    => 'required',
            'price.*'       => 'required',
            'subtotal.*'    => 'required',
            'total_amount'  => 'required',
        ]);

        if ($validated->fails()) {
            notify()->error($validated->errors()->first());
            return back();
        }
        DB::beginTransaction();
        try {
            $purchase                = new Purchase();
            $purchase->supplier_id   = $request->supplier_id;
            $purchase->invoice_no    = $request->invoice_no;
            $purchase->purchase_date = $request->purchase_date;
            $purchase->total_amount  = $request->total_amount;
            $purchase->created_by    = auth()->user()->name;
            $purchase->save();

            foreach ($request->product as $key => $product) {
                $purchase->items()->create([
                    'product_id' => $product,
                    'quantity'   => $request->quantity[$key],
                    'price'      => $request->price[$key],
                    'subtotal'   => $request->subtotal[$key],
                ]);

                // Update stock
                $stock_update = ProductStock::firstOrCreate(
                    ['product_id' => $product],
                    ['stock' => 0]
                );

                $stock_update->increment('stock', $request->quantity[$key]);
            }
            DB::commit();

            notify()->success('Purchase created successfully');
            return redirect()->route('purchases.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            notify()->error($th->getMessage());
            return back();
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
            'purchase'  => Purchase::findOrFail($id),
            'products'  => Product::all(),
            'suppliers' => Supplier::all(),
        ];

        return view('backend.pages.purchases.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'supplier_id'   => 'required',
            'invoice_no'    => 'required',
            'purchase_date' => 'required|date',
            'product.*'     => 'required|exists:products,id',
            'quantity.*'    => 'required|numeric|min:1',
            'price.*'       => 'required|numeric|min:0',
            'subtotal.*'    => 'required|numeric|min:0',
            'total_amount'  => 'required|numeric|min:0',
        ]);

        if ($validated->fails()) {
            notify()->error($validated->errors()->first());
            return back();
        }

        DB::beginTransaction();

        try {
            $purchase = Purchase::with('items')->findOrFail($id);

            // Step 1: Rollback stock for old items (reduce previously added stock)
            foreach ($purchase->items as $item) {
                $stock_old = ProductStock::firstWhere('product_id', $item->product_id);
                if ($stock_old) {
                    if ($stock_old->stock < $item->quantity) {
                        throw new \Exception(
                            'Stock inconsistency detected for product ID: ' . $item->product_id
                        );
                    }
                    $stock_old->decrement('stock', $item->quantity);
                }
            }

            // Step 2: Update purchase main info
            $purchase->update([
                'supplier_id'   => $request->supplier_id,
                'invoice_no'    => $request->invoice_no,
                'purchase_date' => $request->purchase_date,
                'total_amount'  => $request->total_amount,
                'created_by'    => auth()->user()->name,
            ]);

            // Step 3: Delete old items
            $purchase->items()->delete();

            // Step 4: Add new items and update stock
            foreach ($request->product as $key => $product_id) {
                $purchase->items()->create([
                    'product_id' => $product_id,
                    'quantity'   => $request->quantity[$key],
                    'price'      => $request->price[$key],
                    'subtotal'   => $request->subtotal[$key],
                ]);

                // Update stock for new items
                $stock_update = ProductStock::firstOrCreate(
                    ['product_id' => $product_id],
                    ['stock' => 0]
                );

                $stock_update->increment('stock', $request->quantity[$key]);
            }

            DB::commit();

            notify()->success('Purchase updated successfully');
            return redirect()->route('purchases.index');

        } catch (\Exception $e) {
            DB::rollBack();
            notify()->error('Something went wrong! ' . $e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $purchase = Purchase::with('items')->findOrFail($id);

            // Rollback stock
            foreach ($purchase->items as $item) {
                $stock = ProductStock::where('product_id', $item->product_id)->first();
                if ($stock) {
                    $stock->decrement('stock', $item->quantity);
                }
            }

            $purchase->items()->delete();
            $purchase->delete();

            DB::commit();
            notify()->success('Purchase deleted successfully');
            return redirect()->route('purchases.index');
        } catch (\Exception $e) {
            DB::rollBack();
            notify()->error('Something went wrong! ' . $e->getMessage());
            return back();
        }
    }

    public function recycleBin()
    {
        $purchases = Purchase::onlyTrashed()->get();
        return view('backend.pages.recycle.purchase', compact('purchases'));
    }

    public function restore($id)
    {
        DB::beginTransaction();

        try {
            $purchase = Purchase::withTrashed()->with(['items' => fn($q) => $q->withTrashed()])->findOrFail($id);

            // Check stock availability
            // foreach ($purchase->items as $item) {
            //     $stock = ProductStock::where('product_id', $item->product_id)->first();

            //     if (! $stock || $stock->stock < $item->quantity) {
            //         throw new \Exception('Not enough stock to restore this purchase.');
            //     }
            // }

            // Restore purchase & items
            $purchase->restore();
            $purchase->items()->restore();

            // Deduct stock again
            foreach ($purchase->items as $item) {
                ProductStock::where('product_id', $item->product_id)
                    ->increment('stock', $item->quantity);
            }

            DB::commit();
            notify()->success('Purchase restored successfully');
            return redirect()->route('purchases.index');
        } catch (Throwable $th) {
            DB::rollBack();
            notify()->error('Something went wrong! ' . $th->getMessage());
            return back();
        }
    }

    public function forceDelete($id)
    {
        DB::beginTransaction();

        try {
            $purchase = Purchase::withTrashed()
                ->with(['items' => fn($q) => $q->withTrashed()])
                ->findOrFail($id);

            // Permanently delete purchase items
            $purchase->items()->forceDelete();

            // Permanently delete purchase
            $purchase->forceDelete();

            DB::commit();
            notify()->success('Purchase permanently deleted');
            return back();

        } catch (\Throwable $th) {
            DB::rollBack();
            notify()->error($th->getMessage());
            return back();
        }
    }

}

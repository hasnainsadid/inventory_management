<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('backend.pages.products.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'slug' => slugify($request->name),
            'sku' => $request->sku,
            'unit' => $request->unit,
            'purchase_price' => $request->purchase_price,
            'sale_price' => $request->sale_price,
            'alert_quantity' => $request->alert_quantity,
            'category_id' => $request->category_id,
            'image' => imageUploadManager($request->image, 'image', 'product'),
        ]);

        notify()->success('Product Created Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = slugify($request->name);
        $product->sku = $request->sku;
        $product->unit = $request->unit;
        $product->purchase_price = $request->purchase_price;
        $product->sale_price = $request->sale_price;
        $product->alert_quantity = $request->alert_quantity;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $product->image = imageUpdateManager($request->file('image'), $product->slug, 'product', $product->image);
        }
        $product->save();

        notify()->success('Product Updated Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        imageDeleteManager($product->image);
        notify()->success('Product Deleted Successfully');
        return redirect()->route('products.index');
    }
}

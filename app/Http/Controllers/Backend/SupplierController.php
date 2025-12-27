<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SupplierDataTable;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SupplierDataTable $dataTable)
    {
        return $dataTable->render('backend.pages.suppliers.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:suppliers,email',
            'phone' => 'required|unique:suppliers,phone',
            'address' => 'required',
        ]);

        if ($validated->fails()) {
            notify()->error($validated->errors()->first());
            return back();
        }

        Supplier::create($request->all());
        notify()->success('Supplier created successfully');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:suppliers,email,' . $id,
            'phone' => 'required|unique:suppliers,phone,' . $id,
            'address' => 'required',
        ]);

        if ($validated->fails()) {
            notify()->error($validated->errors()->first());
            return back();
        }

        Supplier::findOrFail($id)->update($request->all());
        notify()->success('Supplier updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        notify()->success('Supplier deleted successfully.');
        return redirect()->back();
    }

    public function recycleBin() {
        $suppliers = Supplier::onlyTrashed()->get();
        return view('backend.pages.recycle.supplier', compact('suppliers'));
    }

}

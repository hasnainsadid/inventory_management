<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\DataTables\StockDataTable;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index(StockDataTable $dataTable)
    {
        // dd(Product::with('category', 'stock')->first());

        return $dataTable->render('backend.pages.report.stock');
    }
}

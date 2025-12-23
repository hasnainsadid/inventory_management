<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $categories = Category::all();
        // return view('backend.pages.categories.index', compact('categories'));

        if ($request->ajax()) {
            $categories = Category::query();
            return DataTables::of($categories)
                ->addColumn('status', function ($row) {
                    return ucfirst($row->status);
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })
                ->addColumn('actions', function ($row) {
                    return '
                    <a href="' . route('categories.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>
                    <button class="btn btn-sm btn-danger delete" data-id="' . $row->id . '">Delete</button>
                ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('backend.pages.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'slug' => slugify($request->name)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 
    }
}

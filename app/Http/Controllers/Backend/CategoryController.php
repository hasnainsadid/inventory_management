<?php
namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    // {
    //     // $categories = Category::all();
    //     // return view('backend.pages.categories.index', compact('categories'));

    //     if ($request->ajax()) {
    //         $categories = Category::query();
    //         return DataTables::of($categories)
    //             ->addColumn('status', function ($row) {
    //                 return ucfirst($row->status);
    //             })
    //             ->addColumn('created_at', function ($row) {
    //                 return $row->created_at->diffForHumans();
    //             })
    //             ->addColumn('actions', function ($row) {
    //                 return '
    //                 <a href="' . route('categories.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>
    //                 <button class="btn btn-sm btn-danger delete" data-id="' . $row->id . '">Delete</button>
    //             ';
    //             })
    //             ->rawColumns(['actions'])
    //             ->make(true);
    //     }
    //     return view('backend.pages.categories.index');
    // }
    {
        return $dataTable->render('backend.pages.categories.index');
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

        notify()->success('Category has been created successfully.');
        return back();
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
        $category = Category::findOrFail($id);
        $category->delete();
        notify()->success('Category has been deleted successfully.');
        return back();
    }

    public function recycleBin() {
        $categories = Category::onlyTrashed()->get();
        return view('backend.pages.Recycle.category', compact('categories'));
    }

    public function restore($id) {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        notify()->success('Category has been restored successfully.');
        return back();
    }

    public function forceDelete($id) {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        notify()->success('Category has been permanently deleted.');
        return back();
    }
}

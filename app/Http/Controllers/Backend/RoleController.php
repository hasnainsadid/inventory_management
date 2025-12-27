<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('backend.pages.roles.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        notify()->success('Role created successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);

        notify()->success('Role updated successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addPermission($id)
    {
        $role   = Role::findOrFail($id);
        $routes = collect(Route::getRoutes())
            ->map(function ($route) {
                return $route->getName();
            })
            ->filter() // null বাদ
            ->unique()
            ->values();
            // dd($routes);
        return view('backend.pages.roles.add-permission', compact('role', 'routes'));
    }
}

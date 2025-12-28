<?php
namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('backend.pages.users.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|unique:users,phone',
            'address'  => 'required|string',
            'password' => 'required|min:6',
            'role'     => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => bcrypt($request->password),
        ]);

        // Assign role
        $user->assignRole($request->role);

        notify()->success('User created successfully');
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user  = User::with('roles')->findOrFail($id);
        $roles = Role::pluck('name');

        // dd($user);

        return response()->json([
            'user'  => $user,
            'role'  => $user->roles->pluck('name')->first(), // single role
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $user = User::findOrFail($id);

        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'phone'   => 'required|unique:users,phone,' . $user->id,
            'address' => 'required|string',
        ]);

        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        // Replace old role
        $user->syncRoles([$request->role]);

        notify()->success('User updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $user = User::findOrFail($id);

        // Remove roles & permissions (important)
        $user->syncRoles([]);
        $user->syncPermissions([]);

        // Delete user
        $user->delete();

        notify()->success('User deleted successfully');
        return redirect()->route('users.index');
    }

}

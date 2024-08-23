<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Traits\FileUploadTrait;

class PermissionController extends Controller
{
    use FileUploadTrait;
    
    public function index()
    {
        try {
            // Retrieve all permissions & roles
            $permissions = Permission::with('roles')->get();
    
            // Check if permissions were found
            if ($permissions->isEmpty()) {
                // Handle case where no permissions are found
                return view('permissions.list')->with('permissions');
            }
    
            // Return the view with the permissions data
            return view('permissions.list', compact('permissions'));

        } catch (\Exception $e) {
            // Handle any exceptions or errors during database retrieval
            return view('permissions.list')->withErrors('An error occurred while retrieving permissions.');
        }
    }
    
    public function store(Request $request)
    {
        $data =  [
                'name' => $request->permission_name,
                'description' => $request->permission_desc,
            ];
        $user = Permission::create($data);

        return redirect()->route('permissions.index');
    }
    
    public function edit(Role $role)
    {
        // $roles = \App\Models\Role::select('id','name')->get();
        return view('permissions.edit',compact('permissions'));
    }

    public function update(Request $request, Role $permission)
    {
        // $user->update($request->only('name','email','permission_id'));

        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }
    
    public function destroy(Permission $permission)
    {
        // $user->delete();

        return redirect()->route('permissions.index')
                        ->with('success','Permission deleted successfully');
    }

}

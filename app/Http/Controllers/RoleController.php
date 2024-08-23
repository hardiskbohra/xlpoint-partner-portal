<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Hash;
use App\Traits\FileUploadTrait;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    use FileUploadTrait;
    
    public function index(Request $request)
    {
        try {
            // Retrieve all roles
            $roles = Role::get();
            
            // Retrieve all permissions
            $permissions = Permission::with('childPermissions')->whereNull('parent_id')->orderBy('name')->get();
    
            // Check if roles were found
            if ($roles->isEmpty()) {
                // Handle case where no roles are found
                return view('roles.list')->with('roles');
            }
    
            // Return the view with the roles data
            if ($request->ajax()) {
                return view('roles.partial.list', compact(['roles', 'permissions']))->render();
            }
            return view('roles.list', compact(['roles', 'permissions']));

        } catch (\Exception $e) {
        }
    }
    
    public function store(RoleRequest $request)
    {
        try
        {
            $data = $request->validated();
            $role = Role::create($data);
            
            if ($request->has('permissions')) {
                foreach ($request->permissions as $one) {
                   $res[] = [ 'permission_id' => $one, 'role_id' => $role->id];
                }
                RolePermission::insert($res);
            }
        }
        catch(\Exception $e)
        {
            return response()->json([
                    'success' => false,
                    'error' => $e->getMessage(),
                    'message' => 'Role Insertion failed!'
                ]);
        }
       
        
        return response()->json([
            'success' => true,
            'message' => 'Role Added successfully!'
        ]);
    }
    
    public function edit(Role $role)
    {
        // $roles = \App\Models\Role::select('id','name')->get();
        return view('roles.edit',compact('roles'));
    }

    public function update(Request $request, Role $role)
    {
        // $user->update($request->only('name','email','role_id'));

        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    
    public function destroy(Role $role)
    {
            
        $role->update(['status' => 0]);

        // Redirect with a success message
        return redirect()->route('roles.index')
                        ->with('success', 'Role deleted successfully');
    }
    
    public function updateRoleStatus($id, $status)
    {
    
        try
        {
            $role = Role::find($id);
    
            // Update the role status
            $role->update(["status" => $status]);
    
        }
        catch(\Exception $e)
        {
            // Log the exception message
            dd($e->getMessage());
    
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Role updation failed!'
            ]);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!'
        ]);
    }


}

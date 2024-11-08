<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('backend.roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'description' => 'nullable|string',
            'permissions' => 'array', 
            'permissions.*' => 'exists:permissions,id', 
        ]);
    
        if ($validator->fails()) {
            Toastr::error('Fill all fields', 'Error');
            return back()->withInput()->withErrors($validator);
        }
    
        $validated = $validator->validated();
    
        try {
            // Create the role
            $role = Role::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
            ]);
    
            // Attach permissions if any are selected
            if (!empty($validated['permissions'])) {
                $role->permissions()->attach($validated['permissions']);
            }
    
            Toastr::success('Role created successfully!', 'Success');
        } catch (Exception $e) {
            Toastr::error('An error occurred while creating the role', 'Error');
            return back();
        }
    
        return redirect()->route('backend.roles.index')->with('success', 'Role created successfully!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('backend.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $role->id,
            'description' => 'nullable|string',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            Toastr::error('Fill all fields', 'Error');
            return back()->withInput()->withErrors($validator);
        }

        $validated = $validator->validated();

        try {
            $role->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
            ]);

            // Sync permissions to update existing ones
            $role->permissions()->sync($validated['permissions'] ?? []);

            Toastr::success('Role updated successfully!', 'Success');
        } catch (Exception $e) {
            Toastr::error('An error occurred while updating the role', 'Error');
            return back();
        }

        return redirect()->route('backend.roles.index')->with('success', 'Role updated successfully!');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('backend.roles.index')->with('success', 'Role deleted successfully!');
    }

    public function editPermissions(Role $role)
    {
        $permissions = Permission::all();
        return view('backend.roles.permissions', compact('role', 'permissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);

        return redirect()->route('backend.roles.index')->with('success', 'Role permissions updated successfully!');
    }
}

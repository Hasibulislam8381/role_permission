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
        return view('backend.roles.create');
    }

    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:roles,name',
             'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            Toastr::error('Fill all field', 'Error');
            return back()
                ->withInput()  
                ->withErrors($validator) 
                ->with('modal', 'addroleModal'); 
        }
        $validated = $validator->validate();
        try{
            Role::create($validated);
        }catch(Exception $e){
            Toastr::success('Category Updated', 'Success');
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
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'description' => 'nullable|string',
        ]);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

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

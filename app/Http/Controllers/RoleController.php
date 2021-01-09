<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id','DESC')->paginate(8);
        return view('manage.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('manage.roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:roles',
            'display_name' => 'required|min:3',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        if (!empty($request->permission_selected)) {
            $role->syncPermissions(explode(',',$request->permission_selected));
        }

        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        return view('manage.roles.show',compact('role'));
    }

    public function edit($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        $permissions = Permission::all();
        return view('manage.roles.edit',compact(['role','permissions']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:roles,name,'.$id,
            'display_name' => 'required|min:3',
            'description' => 'required'
        ]);
    
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        
        if (!empty($request->permission_selected)) {
            $role->syncPermissions(explode(',',$request->permission_selected));
        }else{
            $role->permissions()->detach($request->permission_selected);
        }
        
        if ($role->save()) {
            return redirect()->route('roles.show',$role->id);
        }
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id','DESC')->paginate(8);
        return view('manage.permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('manage.permissions.create');
    }

    public function store(Request $request)
    {
        if ($request->insert_method=='basic') {

            $this->validate($request,[
              'name' => 'required|min:3|unique:permissions,name',
              'display_name' => 'required|min:3',
              'description' => 'required'
            ]);
    
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
    
            if ($permission->save()) {
              return redirect()->route('permissions.index');
            }
          }else{
            $resource = $request->resource;
            $crud = explode(',',$request->crud_selected);
            if (count($crud)>0) {
              foreach ($crud as $item) {
                $slug = $item.'-'.$resource;
                $display_name = $item.' '.$resource;
                $description = 'allow user to '.$item.' '.$resource;
    
                $permission = new Permission();
                $permission->name = $slug;
                $permission->display_name = $display_name;
                $permission->description = $description;
                $permission->save();
              }
              return redirect()->route('permissions.index');
            }
          }
    }

    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.show',compact('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('manage.permissions.edit',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:permissions,name',
            'display_name' => 'required|min:3',
            'description' => 'required'
        ]);
  
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;

        if ($permission->save()) {
        return redirect()->route('permissions.show',$id);
        }
    }

    public function destroy($id)
    {
        //
    }
}

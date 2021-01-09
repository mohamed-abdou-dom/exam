<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;
use Hash;
class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(8);
        return view('manage.users.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('manage.users.create',compact(['roles','permissions']));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users',
        ]);

        if (\Request::has('password')&& !empty($request->password)) {
            $password = trim($request->password);
          }
          else {
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrsvutxyzABCDEFGHIJKLMNOPQRSVUTXYZ';
            $str = '';
            $max = mb_strlen($keyspace,'8bit')-1;
            for ($i=0; $i < $length; ++$i) {
              $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();

        if (!empty($request->roles)) {
            $user->syncRoles(explode(',',$request->roles));
        }
        if (!empty($request->permissions)) {
            $user->syncPermissions(explode(',',$request->permissions));
        }

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::where('id',$id)->with(['permissions','roles'])->first();
        return view('manage.users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->with(['permissions','roles'])->first();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('manage.users.edit',compact(['user','permissions','roles']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password_options=='auto_pass') {
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrsvutxyzABCDEFGHIJKLMNOPQRSVUTXYZ';
            $str = '';
            $max = mb_strlen($keyspace,'8bit')-1;
            for ($i=0; $i < $length; ++$i) {
              $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
            $user->password = Hash::make($password);
        }
        elseif ($request->password_options=='manaually') {
            $user->password = Hash::make($request->password);
        }
    
        if (!empty($request->roles)) {
            $user->syncRoles(explode(',',$request->roles));
        }
        else{
                $user->roles()->detach($request->roles);
        }
        
        if (!empty($request->permissions)) {
            $user->syncPermissions(explode(',',$request->permissions));
        }
        else{
            $user->Permissions()->detach($request->permissions);
        }

        if ($user->save()) {
            return redirect()->route('users.show',$user->id);
        }
    
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}

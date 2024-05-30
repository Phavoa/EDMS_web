<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
 
    public function index()
    {
        // for combo boxes
        // $roles = Role::pluck('name','id')->all();
        // $roles = Role::all();
        // $permissions = Permission::pluck('name','id')->all();
        // for table
        //$rs = Role::all();
        
         $roles = Role::all();
        $p = Permission::all();
         
        return view('roles.index',compact('roles','p'));
    }



    public function store(Request $request)
    {
      
     $request->validate([

        'rolename' => [
            'required',
            'string',
            'unique:roles,name'
        ]
        ]);
     $role = Role::create(['name'=>$request->rolename]);
     return redirect('/admin/roles');

    }


}

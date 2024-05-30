<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionsController extends Controller
{
    public function index()
    {
        // for combo boxes
        // $roles = Role::pluck('name','id')->all();
        // $roles = Role::all();
        // $permissions = Permission::pluck('name','id')->all();
        // for table
        // $rs = Role::all();


        
        $p = Permission::get();
       
        
        
;
    }



    public function store(Request $request)
    {
      
     $request->validate([

        'permissionname' => [
            'required',
            'string',
            'unique:roles,name'
        ]
        ]);
     $role = Permission::create(['name'=>$request->permissionname]);
     return redirect('roles');

    }

}

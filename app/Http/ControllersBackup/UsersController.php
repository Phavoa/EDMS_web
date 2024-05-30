<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\User;
use App\Models\Gender;
use App\Models\Folder;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UsersController extends Controller
{



    public function index()
    
    {


        
          $users = User::all();
          $departments = Department::all();
          $roles = Role::all();
          $genders = Gender::all();
          return view('users.index',compact('users','departments','roles','genders'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'fname' => 'required|string|max:255',
          'lname' => 'required|string|max:255',
          'gender_id' => 'required',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:8|confirmed',
          'department_id' => 'required',
          'role_id' => 'required',
        ]);



        $user = new User;
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->gender_id = $request->input('gender_id');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->department_id = $request->input('department_id');
        $user->role_id= $request->input('role_id');
        $user->status = true;
        $user->save();
        
        $role = $request->input('role_id');
        $role_r = Role::where('id',$role)->firstOrFail();
        $user->assignRole($role_r);

        return redirect('/admin/users')->with('success','User Added');

     }

    
}

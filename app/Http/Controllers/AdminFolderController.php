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

class AdminFolderController extends Controller
{
    
    public function index()
    
    {
        
          $folders_admin = Folder::all();
          
          return view('documents.index',compact('folders_admin'));
    }
     
    
    public function show()
    {
      
        return view('documents.index2');
        
    }

}

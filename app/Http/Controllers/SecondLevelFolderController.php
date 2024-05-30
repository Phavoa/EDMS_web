<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\secondlevelfolder;

class SecondLevelFolderController extends Controller
{
    public function index()
    
    {
        
          
    }

    public function store(Request $request)
    {
        if (Auth::user()){

           

            $request->validate([
                "name" => 'required'
            ]);
            
            $user_id = Auth::id();
            $user_department_id = Auth::user()->department_id;
         

            secondlevelfolder::create([
             "name" => $request->name,
             "user_id" => $user_id,
             "department_id" => $user_department_id
        ]);
        return redirect('/user/documents')->with([
            "success" => "Department added"
        ]);

        }
       
        
        
       
        // return redirect('/user/documents')->with('success','Document Added');

     }

}

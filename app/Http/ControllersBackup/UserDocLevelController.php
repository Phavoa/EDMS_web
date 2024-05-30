<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FolderDocLevel;
use Illuminate\Support\Facades\Auth;
class UserDocLevelController extends Controller
{
    public function index()
    {
      
       $folders_level = FolderDocLevel::all();

        return view('User.documents.index2',compact('folders_level'));
    }



    public function store(Request $request)
    {
        if (Auth::user()){

            $request->validate([
                "foldername" => 'required'
            ]);

            dump($request->foldername);
            
            $user_id = Auth::id();
            $user_department_id = Auth::user()->department_id;
   
            return redirect('/user/documents');
    
           
        }
    }
}

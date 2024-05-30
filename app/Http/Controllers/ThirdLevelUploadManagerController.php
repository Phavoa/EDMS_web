<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\thirdleveluploaddoc;
use Illuminate\Http\Request;

class ThirdLevelUploadManagerController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::user()){

            $request->validate([
                "docupload" => 'required'
            ]);
                
           

            $file = $request->file('docupload');
             
              $original_doc_name =  $file->getClientOriginalName();
              $doc_exetension = $file->getClientOriginalExtension();
              $getsize = $file->getSize();
              $mimetype = $file->getMimeType();
              $user_id = Auth::id();
              $user_department_id = Auth::user()->department_id;



           $destinationPath = "uploads";
           
          $file->move($destinationPath, $original_doc_name); 
          


            thirdleveluploaddoc::create([
                "name" => $original_doc_name,
                "user_id" => $user_id,
                "department_id" => $user_department_id,
                "filesize" => $getsize,
                "mimetype" => $mimetype,
                "exe" => $doc_exetension 
                
           ]);
           return redirect('/user/secondlevel/{name}')->with([
               "success" => "Department added"
           ]);


        }
        
       
        return redirect('/user/secondlevel/{name}')->with('success','Document Added');

     }
}

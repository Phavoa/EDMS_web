<?php

namespace App\Http\Controllers;

use App\Models\secondleveluploaddoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UploadmangerController extends Controller
{
    

  public function index(){
     
  }


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
          


            secondleveluploaddoc::create([
                "name" => $original_doc_name,
                "user_id" => $user_id,
                "department_id" => $user_department_id,
                "filesize" => $getsize,
                "mimetype" => $mimetype,
                "exe" => $doc_exetension 
                
           ]);
           return redirect('/user/documents/{name}')->with([
               "success" => "Department added"
           ]);


        }
        
       
        return redirect('/user/documents/{name}')->with('success','Document Added');

     }





    //  public function upload(Request $request)
    //  {
    //      // Validate the request
    //      $request->validate([
    //          'file' => 'required|mimes:pdf,doc,docx|max:2048', // Example validation for file upload
    //      ]);
 
    //      // Retrieve the folder ID from the URL or hidden input field
    //      // (In this example, I'm using both for demonstration)
    //     //  $folder_id = $request->folder_id ?? $folder_id;
 
    //      // Logic to store the uploaded file
    //      $file = $request->file('file');
    //      $fileName = time().'_'.$file->getClientOriginalName();
    //      $filePath = $file->storeAs('uploads', $fileName);
 
    //     //  // Save document record to the database
    //      $document = new Document;
    //      $document->folder_id = $folder_id;
    //      $document->file_path = $filePath;
    //      $document->save();
 
    //     //  // Redirect or return response
    //      return redirect()->back()->with('success', 'File uploaded successfully!');
    //  }

}

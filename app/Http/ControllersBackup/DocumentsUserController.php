<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use Illuminate\Http\Request;

class DocumentsUserController extends Controller
{
    public function index()
    {
      

        $folders = Folder::all();
        
        return view('User.documents.index',compact('folders'));
    }


    public function create()
    {
      
    
    }

    public function store()
    {
      
        
    }

}

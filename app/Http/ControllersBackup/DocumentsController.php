<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
      

        $folders = Folder::all();
        
        
        return view('documents.index',compact('folders'));
    }

}

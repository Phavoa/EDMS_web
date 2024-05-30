<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\secondlevelfolder;
use App\Models\secondleveluploaddoc;
use App\Models\thirdlevelfolder;
use App\Models\thirdleveluploaddoc;
use App\Models\User;

class FoldersController extends Controller
{


    public function index()

    {






    }

    public function create(Request $request){

        $parent_id = $request->query('parent_id');
        return view('User.documents.index', compact('parent_id'));

    }






    public function show()

    {


    }






    public function store(Request $request)
    {






     }

}

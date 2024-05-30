<?php

// namespace App\Http\Controllers;

// use App\Models\Folder;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class FolderController extends Controller
// {
//     public function index()
//     {
//         $user_department_id = Auth::user()->department_id;

//         $folders = Folder::select('user_id', 'department_id', 'name', 'created_at')->where('department_id', $user_department_id)->get();

//         return view('folders.index', compact('folders'));
//     }

//     public function create(Request $request)
//     {
//         $parent_id = $request->query('parent_id');
//         return view('folders.create', compact('parent_id'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'parent_id' => 'nullable|exists:folders,id',
//         ]);

//         Folder::create($request->all());

//         return redirect()->route('folders.index')->with('success', 'Folder created successfully.');
//     }

//     public function show(Folder $folder)
//     {
//         $folder->load('children', 'files');
//         return view('folders.show', compact('folder'));
//     }

//     public function edit(Folder $folder)
//     {
//         $folders = Folder::all();
//         return view('folders.edit', compact('folder', 'folders'));
//     }

//     public function update(Request $request, Folder $folder)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'parent_id' => 'nullable|exists:folders,id',
//         ]);

//         $folder->update($request->all());

//         return redirect()->route('folders.index')->with('success', 'Folder updated successfully.');
//     }

//     public function destroy(Folder $folder)
//     {
//         $folder->delete();

//         return redirect()->route('folders.index')->with('success', 'Folder deleted successfully.');
//     }
// }
